<?php

namespace Fxtutor\Wallet;

use App\Member;
use Carbon\Carbon;
use Fxtutor\Wallet\Transaction;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Affiliate extends Model
{
    protected $guarded = [];

    protected $table = 'affiliate_member_maps';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;


    public function parent()
    {
        return $this->hasOne(self::class, 'member_id', 'ref_id');
    }

    public function children()
    {
        return $this->hasMany(self::class, 'ref_id', 'member_id');
    }

    public static function childQuery(Member $member = null, $depth = 5)
    {
        // minimum version required to run this query is mysql 8.0.1 or mariadb 10.2.2
        $referral = DB::select("WITH RECURSIVE cte AS( 
            SELECT id, member_id, ref_id, 2 AS depth FROM affiliate_member_maps WHERE ref_id = ? 
            UNION ALL 
            SELECT r.id, r.member_id, r.ref_id, cte.depth + 1 FROM affiliate_member_maps r INNER JOIN cte ON r.ref_id = cte.member_id ) 
            SELECT * FROM cte where depth <= ?", [$member->id, $depth]);

        return collect($referral);

    }

    public static function getAffiliateTree(Member $member = null, $depth = 5)
    {
        if ($member == null) {
            $member= Auth::user();
        }

        $referral = self::childQuery($member, $depth);
        
        $member_ids = $referral->pluck('member_id');

        $rg = $referral->groupBy('ref_id');
        
        $members = Member::whereIn('id', $member_ids)->get();
        
        $fnBuilder = function ($siblings) use (&$fnBuilder, $rg, $members) {
            foreach ($siblings as $k => $sibling) {
                $id = $sibling->id;
                if (isset($rg[$id])) {
                    $gu = $members->whereIn('id', $rg[$id]->pluck('member_id'))->values()->all();
                    $sibling->children = $fnBuilder($gu);
                }
                $siblings[$k] = $sibling;
            }
            return $siblings;
        };
    
        $tree = $fnBuilder([$member]);

        return $tree;
    }

    public static function parentsQuery(Member $member = null, $depth = 5)
    {
        $depth = intval($depth) + 1; 
        // minimum version required to run this query is mysql 8.0.1 or mariadb 10.2.2
        $referral = DB::select("WITH RECURSIVE cte AS( 
            SELECT id, member_id, ref_id, ? AS depth FROM affiliate_member_maps WHERE member_id = ? 
            UNION ALL 
            SELECT r.id, r.member_id, r.ref_id, cte.depth - 1 FROM affiliate_member_maps r INNER JOIN cte ON r.member_id = cte.ref_id ) 
            SELECT * FROM cte where depth > 0 ORDER BY depth DESC", [$depth, $member->id]);

        

        return collect($referral);
    }

    public static function getParentsTree(Member $member = null, $depth = 5)
    {
        if ($member == null) {
            $member= Auth::user();
        }
        
        $referral = self::parentsQuery($member, $depth);

        $member_ids = $referral->pluck('member_id');
        $member_ids = $member_ids->merge($referral->pluck('ref_id'))->unique()->filter(function ($value) { return !is_null($value);});
       
        $members = Member::whereIn('id', $member_ids)->get();

        $fnBuilder = function ($sibling) use (&$fnBuilder, $referral, $members) {
            $id = $sibling->id;
            $pu =  $referral->where('member_id', $id)->first();
            if (!$pu) {
                return $sibling;
            }
            $gu = $members->where('id', $pu->ref_id)->first();

            if (isset($gu)) {
                $sibling->parent = $fnBuilder($gu);
            }

            return $sibling;
        };
    
        $tree = $fnBuilder($member);

        return $tree;
    }

    public static function transections(Member $member)
    {
        return Transaction::where('member_id', $member->id)->where('action', 'affiliate_commission')->get();
    }


}
