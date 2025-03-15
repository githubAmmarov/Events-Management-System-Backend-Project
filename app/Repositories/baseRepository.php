<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Http\Responses\Response;
use App\Models\Media;
use Exception;
use App\Traits\ApiTraits;
use Illuminate\Support\Facades\Auth;

class baseRepository
{
    use ApiTraits;
    protected Model $model;
    public function __construct(Model $model)
    {
        $this->model = $model;

    }
    public function index()
    {
        $modelName = class_basename($this->model);

        try {
        $data =$this->model::all();
        if ($data->isEmpty()){
            $message="There are no $modelName at the moment";
        }else
        {
            $message="$modelName indexed successfully";
        }
            return Response::Success($data,$message);
        } catch (Exception $e) {
            $error = "Failed to retrieve $modelName." ;
            return Response::Error($error, $e , 500);
        }
    }

    public function store($request)
    {
        $modelName = class_basename($this->model);
        $media = null;
        if ($request->hasFile('media')) {
            $mediaPath = $this->savemedia($request,'accessories');
            $media = Media::create([
                'media_url' => 'storage/' . $mediaPath
            ]);
        }
        try{
            $data=$this->model::create($request);
            $message="$modelName created successfully";
            return Response::Success($data,$message);
        }catch (Exception $e) {
            $error = "Failed to create $modelName." ;
            return Response::Error($error, $e , 500);
        }
    }
    public function update($request, $model)
    {
        $validatedData=$request;
        $modelName = class_basename($this->model);

        $data = $this->model::find($model->id);
        if (!is_null($data)) {
            $data->update($validatedData);
            // Retrieve the updated data
            $data = $this->model::find($model->id);

            $message = "$modelName updated successfully";
            $code = 200;
            return Response::Success($data,$message,$code);
        } else {
            $message = "$modelName not found";
            $code = 404;
            return Response::Error($data,$message,$code);
        }
    }
    public function show($model)
    {
        $modelName = class_basename($this->model);

        $data=$this->model::find($model->id);
        if(!is_null($model))
        {
            $message="This is the information of $modelName number $model->id";
            $code=200;
            return Response::Success($data,$message,$code);
        }else
        {
            $message="$modelName not found";
            $code=404;
            return Response::Error($data,$message,$code);
        }
    }
    public function destroy($model)
    {
        $modelName = class_basename($this->model);

        $data=$this->model::find($model->id);
        if(!is_null($model))
        {
            $data=$this->model::find($model->id)->delete();
            $message="$modelName deleted successfully";
            $code=200;
            return Response::Success($data,$message,$code);
        }else
        {
            $message="$modelName not found";
            $code=404;
            return Response::Error($data,$message,$code);
        }
    }


    public function showDeleted():array
    {
        $modelName = class_basename($this->model);

        $data =$this->model::onlyTrashed()->get()->all();
        if (!$data){
            $message="There are no $modelName deleted at the moment";
        }else
        {
            $message="$modelName indexed successfully";
        }
        return ['message'=>$message,"$modelName"=>$data];
    }

    public function restore($request)
    {
        $ids = $request->input('ids');
        if($ids != null)
        {
            foreach($ids as $id)
            {
                $model = $this->model::onlyTrashed()->find($id);
                if($model) $model->restore();

            }
            $message="restored successfully";
            $code=200;
        }
        else
        {
            $message="objects must be sended";
            $code=404;
        }
        return ['message'=>$message,'code'=>$code];
    }

}
