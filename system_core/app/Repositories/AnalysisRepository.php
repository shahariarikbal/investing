<?php

namespace App\Repositories;

use Auth;
use App\Analysis;
use Illuminate\Support\Str;
use App\Repositories\BaseRepository;

class AnalysisRepository implements ContentRepositoryInterface
{

    use BaseRepository;

    protected $model;

    /**
     * Constructor.
     *
     * @param Project $project
     */
    public function __construct(Analysis $analysis)
    {
        $this->model = $analysis;
    }

    public function store($input)
    {
        $data['title'] = $input['title'];
        $data['body'] = $input['body'];
        $data['orders'] = $input['orders'];
        $data['status'] = $this->model::status($input['status']);
        $data['category_id'] = ($input['subcategory_id'] && intval($input['subcategory_id']) !== 0) ? $input['subcategory_id'] : $input['category_id'];
        $data['slug'] = Str::slug($input['title']);
        if(array_key_exists('feature_image', $input)) {
            $data['feature_image'] = \FileUpload::upload('analysis', $input['feature_image'], ['open graph', 'details', 'carousel', 'thumbnail', 'small thumbnail']);
        }
        $data['created_by'] = Auth::guard('admin')->user()->id;

        return $this->save($this->model, $data);
    }

    public function update($analysis, $input)
    {
        $data['title'] = $input['title'];
        $data['body'] = $input['body'];
        $data['orders'] = $input['orders'];
        $data['status'] = $this->model::status($input['status']);
        $data['category_id'] = ($input['subcategory_id'] && intval($input['subcategory_id']) !== 0) ? $input['subcategory_id'] : $input['category_id'];

        if(array_key_exists('feature_image', $input)) {
            $update_image = $analysis->feature_image;
            \FileUpload::remove('analysis', $update_image, ['open graph', 'details', 'thumbnail', 'small thumbnail']);

            $data['feature_image'] = \FileUpload::upload('analysis', $input['feature_image'], ['open graph', 'details', 'carousel', 'thumbnail', 'small thumbnail']);
        }

        $data['updated_by'] = Auth::guard('admin')->user()->id;
        return $this->save($analysis, $data);
    }

}