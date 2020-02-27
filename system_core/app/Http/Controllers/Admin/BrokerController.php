<?php

namespace App\Http\Controllers\Admin;

use App\Broker;
use App\Country;
use App\PammMam;
use App\BrokerType;
use App\SpreadType;
use App\BrokerVideo;
use App\SeoOptimize;
use App\PressRelease;
use App\PaymentOption;
use App\TradingPlatform;
use App\CountryParameter;
use App\TradingInstrument;
use Illuminate\Support\Str;
use App\RegulatoryAuthority;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class BrokerController extends Controller
{
    public function index ()
    {
        $brokers = Broker::get();
        return view('admin.brokers.index', compact('brokers'));
    }

    public function create ()
    {
        $countries = Country::all();
        $broker_types = BrokerType::all();
        $payment_options = PaymentOption::all();
        $regulatory_authorities = RegulatoryAuthority::all();
        $trading_platforms = TradingPlatform::all();
        $spread_types = SpreadType::all();
        $trading_instruments = TradingInstrument::all();
        $pamm_mams = PammMam::all();

        return view('admin.brokers.create', compact('countries', 'broker_types', 'payment_options', 'regulatory_authorities', 'trading_platforms', 'spread_types', 'trading_instruments', 'pamm_mams'));
    }

    public function store(Request $request)
    {
        //return $request->all();
        $validator = Validator::make($request->all(), [
            
            'country_code'          => 'required',
            'name'                  => 'required|unique:brokers',
            'website_title'         => 'required',
            'website_url'           => 'required',
            'headquarter'           => 'required',
            'founded_in'            => 'required',
            'min_deposit'           => 'required',
        ]);
        
        // if ($validator->fails()) {
        //     return redirect()->back()->with('message');
        // }

        if ($validator->fails()) {
            return redirect()
                        ->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        if($request->has('logo')) {
            $logo = \FileUpload::upload('broker-logo', $request['logo'], ['open graph', 'broker logo md', 'broker logo sm', 'broker logo xs']);
        }

        if($request->has('screenshot')) {
            $screenshot = \FileUpload::upload('broker-screenshot', $request['screenshot'], ['open graph', 'broker screenshot']);
        }
        
        $broker = new Broker;
        
        $broker->country_code = $request->country_code;
        $broker->logo = $logo;
        $broker->screenshot = $screenshot;
        $broker->name = $request->name;
        $broker->slug = Str::slug($request->name, '-');
        $broker->website_title = $request->website_title;
        $broker->website_url = $request->website_url;
        $broker->headquarter = $request->headquarter;
        $broker->founded_in = $request->founded_in;
        $broker->premium = $request->has('premium') ? $request->premium : 0;
        $broker->us_client = $request->has('us_client') ? $request->us_client : 0;
        $broker->min_deposit = intval($request->min_deposit);
        $broker->deposit_bonus = $request->has('deposit_bonus') ? $request->deposit_bonus : 0;
        $broker->first_deposit_bonus = $request->has('first_deposit_bonus') ? $request->first_deposit_bonus : 0;
        $broker->ecn_deposit = $request->has('ecn_deposit') ? $request->ecn_deposit : 0;
        $broker->ecn_deposit_amount = $request->ecn_deposit_amount;
        $broker->islamic_acc = $request->has('islamic_acc') ? $request->islamic_acc : 0;
        $broker->free_vps = $request->has('free_vps') ? $request->free_vps : 0;
        //$broker->pamm_mam = $request->pamm_mam == 0 ? null : $request->pamm_mam;
        
        $broker->scalping = $request->has('scalping') ? $request->scalping : 0;
        $broker->hedging = $request->has('hedging') ? $request->hedging : 0;
        $broker->expert_advisors = $request->has('expert_advisors') ? $request->expert_advisors : 0;
        $broker->carousal = $request->has('carousal') ? $request->carousal : 0;
        $broker->order = $request->order ?: 0;
        
        // process information that can be stored in meta field
        $meta['verified'] = $request->has('verified') ? $request->verified : 0;
        $meta['broker_status'] = $request->broker_status;
        $meta['telephone'] = $request->telephone;
        $meta['fax'] = $request->fax;
        $meta['email_support'] = $request->email_support;
        $meta['international_office'] = $request->international_office;
        $meta['web_language'] = $request->web_language;
        $meta['signup_link'] = $request->signup_link;
        $meta['demo_account'] = $request->has('demo_account') ? $request->demo_account : 0;
        $meta['demo_acc_link'] = $request->demo_acc_link;
        $meta['real_acc_link'] = $request->real_acc_link;
        // $meta['min_deposit'] = $request->min_deposit;
        // $meta['ecn_deposit'] = $request->ecn_deposit;
        $meta['acc_currency'] = $request->acc_currency;
        // $meta['min_leverage'] = $request->min_leverage;
        $meta['max_leverage'] = $request->max_leverage;
        $meta['min_order_vol'] = $request->min_order_vol;
        $meta['interest_margin'] = $request->has('interest_margin') ? $request->interest_margin : 0;
        $meta['os_compatibility'] = $request->os_compatibility;
        $meta['news_feed_stream'] = $request->has('news_feed_stream') ? $request->news_feed_stream : 0;
        $meta['charting_pack'] = $request->has('charting_pack') ? $request->charting_pack : 0;
        $meta['trading_signal'] = $request->has('trading_signal') ? $request->trading_signal : 0;
        $meta['market_commentary'] = $request->has('market_commentary') ? $request->market_commentary : 0;
        $meta['customer_service_time'] = $request->customer_service_time;
        $meta['trade_over_phone'] = $request->has('trade_over_phone') ? $request->trade_over_phone : 0;
        
        $meta['segregeted_acc'] = $request->has('segregeted_acc') ? $request->segregeted_acc : 0;
        
        $meta['institutional_acc'] = $request->has('institutional_acc') ? $request->institutional_acc : 0;
        $meta['vip_service'] = $request->has('vip_service') ? $request->vip_service : 0;
        
        $meta['precision_pricing'] = $request->precision_pricing;
        
        $meta['commission'] = $request->has('commission') ? $request->commission : 0;
        $meta['commission_amount'] = $request->has('commission_amount') ? $request->commission_amount : 0;
        $meta['lowest_spread'] = $request->lowest_spread;
        $meta['one_click_execution'] = $request->has('one_click_execution') ? $request->one_click_execution : 0;
        $meta['oco_orders'] = $request->has('oco_orders') ? $request->oco_orders : 0;
        $meta['managed_acc'] = $request->has('managed_acc') ? $request->managed_acc : 0;
        $meta['email_alerts'] = $request->has('email_alerts') ? $request->email_alerts : 0;
        $meta['mobile_alerts'] = $request->has('mobile_alerts') ? $request->mobile_alerts : 0;
        $meta['trailing_stops'] = $request->has('trailing_stops') ? $request->trailing_stops : 0;
        $meta['mobile_trading'] = $request->has('mobile_trading') ? $request->mobile_trading : 0;
        $meta['web_based_trading'] = $request->has('web_based_trading') ? $request->web_based_trading : 0;
        $meta['customer_support_lang'] = $request->customer_support_lang;
        $meta['email_phone_support'] = $request->has('email_phone_support') ? $request->email_phone_support : 0;
        $meta['personal_acc_manager'] = $request->has('personal_acc_manager') ? $request->personal_acc_manager : 0;
        $meta['trading_tools'] = $request->has('trading_tools') ? $request->trading_tools : 0;
        $meta['other_promotion'] = $request->has('other_promotion') ? $request->other_promotion : 0;
        $meta['other_promotion_text'] = $request->other_promotion_text;
        $meta['trade_close_over_phone'] = $request->has('trade_close_over_phone') ? $request->trade_close_over_phone : 0;

        $broker->meta = $meta;
        
        $broker->save();

        $deposit = [];
        if ($request->deposit_option) {
            foreach($request->deposit_option as $deposit_option) {
                $deposit[intval($deposit_option)] = [
                    'type' => PaymentOption::type("deposit")
                ];
            }
        }
        
        $withdraw = [];
        if ($request->withdraw_option) {
            foreach($request->withdraw_option as $withdraw_option) {
                $withdraw[intval($withdraw_option)] = [
                    'type' => PaymentOption::type("withdraw")
                ];
            }
        }
        

        if($request->broker_type && $request->broker_type[0]) {
            $broker->broker_types()->sync($request->broker_type);
        }
        

        $broker->payment_options()->attach($deposit);
        
        $broker->payment_options()->attach($withdraw);

        if ($request->regulating_authority) {
            $broker->regulatory_authorities()->sync($request->regulating_authority);
        }
        if ($request->trading_platform) {
            $broker->trading_platforms()->sync($request->trading_platform);
        }
        if ($request->spread_type) {
            $broker->spread_types()->sync($request->spread_type);
        }
        if ($request->trading_instrument) {
            $broker->trading_instruments()->sync($request->trading_instrument);
        }
        if ($request->pamm_mam) {
            $broker->pamm_mams()->sync($request->pamm_mam);
        }
        
        //return redirect back()->with('message', 'New broker created successfully');
        return redirect()->back()->with('message', "New broker created successfully");
    }


    public function edit(Broker $broker)
    {
        $broker = Broker::with(['country','broker_types','payment_options','regulatory_authorities','trading_platforms','spread_types','trading_instruments'])
                            ->where('id', $broker->id)->first();
        
        $countries = Country::all();
        $broker_types = BrokerType::all();
        $payment_options = PaymentOption::all();
        $regulatory_authorities = RegulatoryAuthority::all();
        $trading_platforms = TradingPlatform::all();
        $spread_types = SpreadType::all();
        $trading_instruments = TradingInstrument::all();
        $pamm_mams = PammMam::all();
        return view('Admin.brokers.edit', compact(['pamm_mams', 'broker', 'countries', 'broker_types', 'payment_options', 'regulatory_authorities', 'trading_platforms', 'spread_types', 'trading_instruments']));
    }

    public function update(Request $request, Broker $broker)
    {
       
        $validator = $this->validate($request,[
            
            'country_code'          => 'required',
            'name'                  => 'required',
            'website_title'         => 'required',
            'website_url'           => 'required',
            'headquarter'           => 'required',
            'founded_in'            => 'required|numeric',
            'min_deposit'           => 'required',
            
            
        ]);

        if ($request->has('logo')) {
            $validator['logo'] = 'mimes:jpeg,png';
        }

        if ($request->has('screenshot')) {
            $validator['screenshot'] = 'mimes:jpeg,png';
        }

        $update_logo = $broker->logo;
        if($request->has('logo')) {
            $update_logo = $broker->logo;
            \FileUpload::remove('broker-logo', $update_logo, ['open graph', 'broker logo md', 'broker logo sm', 'broker logo xs']);
            $update_logo = \FileUpload::upload('broker-logo', $request->file('logo'), ['open graph', 'broker logo md', 'broker logo sm', 'broker logo xs']);
        }

        $update_screenshot = $broker->screenshot;
        if($request->has('screenshot')) {
            $update_screenshot = $broker->screenshot;
            \FileUpload::remove('broker-screenshot', $update_screenshot, ['open graph','broker screenshot']);
            $update_screenshot = \FileUpload::upload('broker-screenshot', $request->file('screenshot'), ['open graph','broker screenshot']);
        }
        
        $broker->country_code = $request->country_code;
        $broker->logo = $update_logo;
        $broker->screenshot = $update_screenshot;
        $broker->name = $request->name;
        $broker->slug = Str::slug($request->name, '-');
        $broker->website_title = $request->website_title;
        $broker->website_url = $request->website_url;
        $broker->headquarter = $request->headquarter;
        $broker->founded_in = $request->founded_in;
        $broker->premium = $request->has('premium') ? $request->premium : 0;
        $broker->us_client = $request->has('us_client') ? $request->us_client : 0;
        $broker->min_deposit = intval($request->min_deposit);
        $broker->deposit_bonus = $request->has('deposit_bonus') ? $request->deposit_bonus : 0;
        $broker->first_deposit_bonus = $request->has('first_deposit_bonus') ? $request->first_deposit_bonus : 0;
        $broker->ecn_deposit = $request->has('ecn_deposit') ? $request->ecn_deposit : 0;
        $broker->ecn_deposit_amount = $request->ecn_deposit_amount;
        $broker->islamic_acc = $request->has('islamic_acc') ? $request->islamic_acc : 0;
        $broker->free_vps = $request->has('free_vps') ? $request->free_vps : 0;
        //$broker->pamm_mam = $request->pamm_mam == 0 ? null : $request->pamm_mam;
        $broker->scalping = $request->has('scalping') ? $request->scalping : 0;
        $broker->hedging = $request->has('hedging') ? $request->hedging : 0;
        $broker->expert_advisors = $request->has('expert_advisors') ? $request->expert_advisors : 0;
        $broker->carousal = $request->has('carousal') ? $request->carousal : 0;
        $broker->order = $request->order ?: 0;

        // process information that can be stored in meta field
        $meta['verified'] = $request->has('verified') ? $request->verified : 0;
        $meta['broker_status'] = $request->broker_status;
        $meta['telephone'] = $request->telephone;
        $meta['fax'] = $request->fax;
        $meta['email_support'] = $request->email_support;
        $meta['international_office'] = $request->international_office;
        $meta['web_language'] = $request->web_language;
        $meta['signup_link'] = $request->signup_link;
        $meta['demo_account'] = $request->has('demo_account') ? $request->demo_account : 0;
        $meta['demo_acc_link'] = $request->demo_acc_link;
        $meta['real_acc_link'] = $request->real_acc_link;
        // $meta['min_deposit'] = $request->min_deposit;
        // $meta['ecn_deposit'] = $request->ecn_deposit;
        $meta['acc_currency'] = $request->acc_currency;
        // $meta['min_leverage'] = $request->min_leverage;
        $meta['max_leverage'] = $request->max_leverage;
        $meta['min_order_vol'] = $request->min_order_vol;
        $meta['interest_margin'] = $request->has('interest_margin') ? $request->interest_margin : 0;
        $meta['os_compatibility'] = $request->os_compatibility;
        $meta['news_feed_stream'] = $request->has('news_feed_stream') ? $request->news_feed_stream : 0;
        $meta['charting_pack'] = $request->has('charting_pack') ? $request->charting_pack : 0;
        $meta['trading_signal'] = $request->has('trading_signal') ? $request->trading_signal : 0;
        $meta['market_commentary'] = $request->has('market_commentary') ? $request->market_commentary : 0;
        $meta['customer_service_time'] = $request->customer_service_time;
        $meta['trade_over_phone'] = $request->has('trade_over_phone') ? $request->trade_over_phone : 0;
        
        $meta['segregeted_acc'] = $request->has('segregeted_acc') ? $request->segregeted_acc : 0;
        
        $meta['institutional_acc'] = $request->has('institutional_acc') ? $request->institutional_acc : 0;
        $meta['vip_service'] = $request->has('vip_service') ? $request->vip_service : 0;
        
        $meta['precision_pricing'] = $request->precision_pricing;
        
        $meta['commission'] = $request->has('commission') ? $request->commission : 0;
        $meta['commission_amount'] = $request->has('commission_amount') ? $request->commission_amount : 0;
        $meta['lowest_spread'] = $request->lowest_spread;
        $meta['one_click_execution'] = $request->has('one_click_execution') ? $request->one_click_execution : 0;
        $meta['oco_orders'] = $request->has('oco_orders') ? $request->oco_orders : 0;
        $meta['managed_acc'] = $request->has('managed_acc') ? $request->managed_acc : 0;
        $meta['email_alerts'] = $request->has('email_alerts') ? $request->email_alerts : 0;
        $meta['mobile_alerts'] = $request->has('mobile_alerts') ? $request->mobile_alerts : 0;
        $meta['trailing_stops'] = $request->has('trailing_stops') ? $request->trailing_stops : 0;
        $meta['mobile_trading'] = $request->has('mobile_trading') ? $request->mobile_trading : 0;
        $meta['web_based_trading'] = $request->has('web_based_trading') ? $request->web_based_trading : 0;
        $meta['customer_support_lang'] = $request->customer_support_lang;
        $meta['email_phone_support'] = $request->has('email_phone_support') ? $request->email_phone_support : 0;
        $meta['personal_acc_manager'] = $request->has('personal_acc_manager') ? $request->personal_acc_manager : 0;
        $meta['trading_tools'] = $request->has('trading_tools') ? $request->trading_tools : 0;
        $meta['other_promotion'] = $request->has('other_promotion') ? $request->other_promotion : 0;
        $meta['other_promotion_text'] = $request->other_promotion_text;
        $meta['trade_close_over_phone'] = $request->has('trade_close_over_phone') ? $request->trade_close_over_phone : 0;

        $broker->meta = $meta;
        //dd($broker);
        $broker->update();
        
        // updat data on relationship
        $deposit = [];
        if ($request->deposit_option) {
            foreach($request->deposit_option as $deposit_option) {
                $deposit[intval($deposit_option)] = [
                    'type' => PaymentOption::type("deposit")
                ];
            }
        }
        
        $withdraw = [];
        if ($request->withdraw_option) {
            foreach($request->withdraw_option as $withdraw_option) {
                $withdraw[intval($withdraw_option)] = [
                    'type' => PaymentOption::type("withdraw")
                ];
            }
        }
        //  dd($deposit, $withdraw);
        $broker->payment_options()->sync([]);

        $broker->payment_options()->attach($deposit);
        
        $broker->payment_options()->attach($withdraw);

        if($request->broker_type && $request->broker_type[0]) {
            $broker->broker_types()->sync($request->broker_type);
        }
        
        
        //dd($withdraw);
        
        
        if ($request->regulating_authority) {
            $broker->regulatory_authorities()->sync($request->regulating_authority);
        }

        if ($request->trading_platform) {
            $broker->trading_platforms()->sync($request->trading_platform);
        }

        if ($request->spread_type) {
            $broker->spread_types()->sync($request->spread_type);
        }

        if ($request->trading_instrument) {
            $broker->trading_instruments()->sync($request->trading_instrument);
        }

        if ($request->pamm_mam) {
            $broker->pamm_mams()->sync($request->pamm_mam);
        }

        return redirect()->back()->with('message', "Broker update successful.");
    }



    public function delete(Broker $broker)
    {
        $broker->delete();
        return back()->with('message','Broker is susseccfully moved to trash.');
    }


    public function destroy($broker)
    {
        $broker = Broker::onlyTrashed()->find($broker);
        $broker->forceDelete();

        return back()->with('message','Broker has been permanently deleted.');
    }


    public function trash()
    {
        $brokers = Broker::select(['id', 'name', 'logo', 'status'])->onlyTrashed()->get();
        

        return view('admin.brokers.trasted-list', compact('brokers'));
    }


    public function restore($broker)
    {
        $broker = Broker::onlyTrashed()->where('id', $broker);
        $broker->restore();

        return back()->with('message','Broker has been restored successfully.');
    }

    public function active(Request $request, Broker $broker)
    {
        //dd($broker);

        $broker->status = 1;
        $broker->save();
        return back()->with('message','Status of "'.$broker->name.'" Broker Updated Susseccfully');
    }

    public function inactive(Request $request, Broker $broker)
    {
        //dd($broker);

        $broker->status = 0;
        $broker->save();
        return back()->with('message','Status of "'.$broker->name.'" Broker Updated Susseccfully');
    }



    public function parametars ()
    {
        $broker_types = BrokerType::all();
        $payment_options = PaymentOption::all();
        $regulatory_authorities = RegulatoryAuthority::all();
        $spread_types = SpreadType::all();
        $trading_instruments = TradingInstrument::all();
        $trading_platforms = TradingPlatform::all();
        $countries = Country::with('parameter')->orderBy('name', 'ASC')->get();
    
        
        return view('admin.brokers.parametars', compact('broker_types', 'payment_options', 'regulatory_authorities', 'spread_types', 'trading_instruments', 'trading_platforms', 'countries'));
    }

    protected function parameterSave(Request $request, $model)
    {
        $this->validate($request,[
            'name'          => 'required',
            'slug'          => 'required',
            'quick_display'   => '',
            'order'         => 'required',
        ]);

        $model->name = $request->name;
        $model->slug = $request->slug;
        $model->description = $request->description;
        if ($model->quick_display = $request->quick_display) {
            $model->quick_display = $request->quick_display;
        } else {
            $model->quick_display = '0';
        }
        $model->order = $request->order;
        $model->save();
    }

    public function brokerTypeStore(Request $request)
    {
        $brokerType = new BrokerType;
        $this->parameterSave($request, $brokerType);

        return back()->with('message', 'Broker type Save successful!');
    }

    public function brokerTypeUpdate(Request $request, BrokerType $parameter)
    {
        $this->parameterSave($request, $parameter);

        return back()->with('message', 'Broker type update successful!');
    }

    public function brokerTypeDestroy(Request $request, BrokerType $parameter)
    {
        if ($parameter->brokers->count() === 0) {
            $deletedParameter = $parameter;
            $parameter->delete();
            return back()->with('message', "Broker type '$deletedParameter->name' delete successful!");
        }

        return back()->with('error', "Broker parameter '$parameter->name' is already in used");       
    }

    public function paymentOptionStore(Request $request)
    {
        $paymentOption = new PaymentOption;
        $this->parameterSave($request, $paymentOption);

        return back()->with('message', 'Broker payment option creation successful!');
    }

    public function paymentOptionUpdate(Request $request, PaymentOption $parameter)
    {
        $this->parameterSave($request, $parameter);

        return back()->with('message', 'Broker payment option update successful!');
    }

    public function paymentOptionDestroy(Request $request, PaymentOption $parameter)
    {
        if ($parameter->brokers->count() === 0) {
            $deletedParameter = $parameter;
            $parameter->delete();
            return back()->with('message', "Broker type '$deletedParameter->name' delete successful!");
        }

        return back()->with('error', "Broker parameter '$parameter->name' is already in used");
    }

    public function regulatoryAuthorityStore(Request $request)
    {
        $regulatoryAuthority = new RegulatoryAuthority;
        $this->parameterSave($request, $regulatoryAuthority);

        return back()->with('message', 'Broker regulatory authority creation successful!');
    }

    public function regulatoryAuthorityUpdate(Request $request, RegulatoryAuthority $parameter)
    {
        $this->parameterSave($request, $parameter);

        return back()->with('message', 'Broker regulatory authority update successful!');
    }

    public function regulatoryAuthorityDestroy(Request $request, RegulatoryAuthority $parameter)
    {
        //dd($parameter->brokers);
        if ($parameter->brokers->count() === 0) {
            $deletedParameter = $parameter;
            $parameter->delete();
            return back()->with('message', "Broker type '$deletedParameter->name' delete successful!");
        }

        return back()->with('error', "Broker parameter '$parameter->name' is already in used");
    }

    public function spreadTypeStore(Request $request)
    {
        $spreadType = new SpreadType;
        $this->parameterSave($request, $spreadType);

        return back()->with('message', 'Spread type creation successful!');
    }

    public function spreadTypeUpdate(Request $request, SpreadType $parameter)
    {
        $this->parameterSave($request, $parameter);

        return back()->with('message', 'Spread type update successful!');
    }

    public function spreadTypeDestroy(Request $request, SpreadType $parameter)
    {
        if ($parameter->brokers->count() === 0) {
            $deletedParameter = $parameter;
            $parameter->delete();
            return back()->with('message', "Broker type '$deletedParameter->name' delete successful!");
        }

        return back()->with('error', "Broker parameter '$parameter->name' is already in used");
    }

    public function tradingInstrumentStore(Request $request)
    {
        $tradingInstrument = new TradingInstrument;
        $this->parameterSave($request, $tradingInstrument);

        return back()->with('message', 'Broker trading instrument creation successful!');
    }

    public function tradingInstrumentUpdate(Request $request, TradingInstrument $parameter)
    {
        $this->parameterSave($request, $parameter);

        return back()->with('message', 'Broker trading instrument update successful!');
    }

    public function tradingInstrumentDestroy(Request $request, TradingInstrument $parameter)
    {
        if ($parameter->brokers->count() === 0) {
            $deletedParameter = $parameter;
            $parameter->delete();
            return back()->with('message', "Broker type '$deletedParameter->name' delete successful!");
        }

        return back()->with('error', "Broker parameter '$parameter->name' is already in used");
    }

    public function tradingPlatformStore(Request $request)
    {
        $tradingPlatform = new TradingPlatform;
        $this->parameterSave($request, $tradingPlatform);

        return back()->with('message', 'Broker trading platform creation successful!');
    }

    public function tradingPlatformUpdate(Request $request, TradingPlatform $parameter)
    {
        $this->parameterSave($request, $parameter);

        return back()->with('message', 'Broker trading platform update successful!');
    }

    public function tradingPlatformDestroy(Request $request, TradingPlatform $parameter)
    {
        if ($parameter->brokers->count() === 0) {
            $deletedParameter = $parameter;
            $parameter->delete();
            return back()->with('message', "Broker type '$deletedParameter->name' delete successful!");
        }

        return back()->with('error', "Broker parameter '$parameter->name' is already in used");
    }

    public function countryParameterUpdate(Request $request)
    {
        //dd($request->all());

        if($request->enable_search && count($request->enable_search) > 0) {
            CountryParameter::query()->truncate();
            foreach($request->enable_search as $key => $enable_search) {
                $country = Country::select('code')->where('code', $key)->first();
                
                CountryParameter::create([
                    'country_code' => $country->code,
                    'quick_display' => $request->quick_display ? array_key_exists($key, $request->quick_display) : false
                ]);
            }
        }
        return back()->with('message', "Country save successfully");
    }

    public function review(Broker $broker)
    {
        return view('admin.brokers.review', compact('broker'));
    }

    public function reviewStore(Request $request, Broker $broker)
    {
        $validator = Validator::make($request->all(), [
            'review'   => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $broker->review = $request->review;
        $broker->save();
        return response()->json(['message' => 'Your broker review data update'], 200);
    }

    public function seo(Broker $broker)
    {
        $seo = $broker->seo_optimize;
        //dd($seo);
        return view('admin.brokers.seo', compact(['seo', 'broker']));
    }

    public function seoStore(Request $request, Broker $broker)
    {
        $validator = Validator::make($request->all(), [
            'title'         => 'required',
            'keyword'       => 'required',
            'description'   => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if ($broker->seo_optimize) {
            $broker->seo_optimize()->update([
                'title' => $request->title,
                'keyword' => $request->keyword,
                'description' => $request->description
            ]);

            return response()->json(['message' => 'Your broker seo data update'], 200);

        } else {
            $broker->seo_optimize()->create([
                'title' => $request->title,
                'keyword' => $request->keyword,
                'description' => $request->description
            ]);
            
            return response()->json(['message' => 'Your broker seo data inserted'], 200);
        }

    }

    public function video(Broker $broker)
    {
        $videos = $broker->videos;
        return view('admin.brokers.video', compact(['broker', 'videos']));
    }

    public function videoStore(Request $request, Broker $broker)
    {
        $validator = Validator::make($request->all(), [
            'code'         => 'required',
            
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $video = new BrokerVideo();
        $video->broker_id   = $broker->id;
        $video->code        = $request->code;
        $video->description = $request->description;
        $video->save();
        return response()->json(['message' => 'Broker video save successfully']);
    }

    public function videoActive(Request $request, Broker $broker, BrokerVideo $video)
    {
        $video->status = true;
        $video->save();
        return redirect()->back()->with('message','Video id "'.$video->id.'" of "'. $broker->name .'" broker is activated');
    }

    public function videoInactive(Request $request, Broker $broker, BrokerVideo $video)
    {
        $video->status = false;
        $video->save();
        return redirect()->back()->with('message','Video id "'.$video->id.'" of "'. $broker->name .'" broker is inactivated');
    }

    public function videoEdit(Broker $broker, BrokerVideo $video)
    {
        return $video;
    }

    public function videoUpdate(Request $request, Broker $broker, BrokerVideo $video)
    {
        $validator = Validator::make($request->all(), [
            'code'         => 'required',
            
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $video->code = $request->code;
        $video->description = $request->description;
        $video->save();
        return response()->json(['message' => 'Broker video update successfully']);
    }

    public function videoDelete(Request $request, Broker $broker, BrokerVideo $video)
    {
        //dd($video);
        $video->delete();

        return redirect()->back()->with('message','This "'. $broker->name .'" Broker Video delete operation successful.');
    }

    public function prosCons(Broker $broker)
    {
        return view('admin.brokers.pros-cons', compact('broker'));
    }

    public function prosConsStore(Request $request, Broker $broker)
    {
        $validator = Validator::make($request->all(), [
            'pros'         => 'required',
            'cons'         => 'required',
            
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $broker->pros = $request->pros;
        $broker->cons = $request->cons;
        $broker->save();
        return response()->json(['message' => 'Broker pros and cons update successfully']);
    }

    public function pressReleases(Broker $broker)
    {
        $press_releases = $broker->press_releases;
        return view('admin.brokers.press-release', compact(['broker', 'press_releases']));
    }

    public function pressReleasesStore(Request $request, Broker $broker)
    {
        $validator = Validator::make($request->all(), [
            'tag'         => 'required',
            'tag_url'     => 'required',
            'title'       => 'required',
            'url'         => 'required',
            
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $press_release = new PressRelease();
        $press_release->broker_id = $broker->id;
        $press_release->tag = $request->tag;
        $press_release->tag_url = $request->tag_url;
        $press_release->title = $request->title;
        $press_release->url = $request->url;
        $press_release->save();
        return response()->json(['message' => 'Broker Press release insert successfully']);
    }

    public function pressReleaseEdit(Broker $broker, PressRelease $pressRelease)
    {
        return $pressRelease;
    }

    public function pressReleaseUpdate(Request $request, Broker $broker, PressRelease $pressRelease)
    {
        $validator = Validator::make($request->all(), [
            'tag'         => 'required',
            'tag_url'     => 'required',
            'title'       => 'required',
            'url'         => 'required',
            
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $pressRelease->update([
            'broker_id'   =>  $broker->id,
            'tag'         =>  $request->tag,
            'tag_url'     =>  $request->tag_url,
            'title'       =>  $request->title,
            'url'         =>  $request->url,
        ]);
        return response()->json(['message' => 'Data successfully updated.'], 200);
    }

    public function pressReleaseActive(Request $request, Broker $broker, PressRelease $pressRelease)
    {
        $pressRelease->status = true;
        $pressRelease->save();
        return redirect()->back()->with('message', 'Press has been active');
    }

    public function pressReleaseInactive(Request $request, Broker $broker, PressRelease $pressRelease)
    {
        $pressRelease->status = false;
        $pressRelease->save();
        return redirect()->back()->with('message', 'Press has been Inactive');
    }

    public function pressDelete(Broker $broker, PressRelease $pressRelease)
    {
        $pressRelease->delete();
        return redirect()->back()->with('message', 'Press has been deleted');
    }
    
}
