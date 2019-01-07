<?php namespace Entity\Repository\Resources;

use App\Resources;
use Entity\Lib\BasicEntity;
use Entity\Repository\RepositoryInterface;
use Exception;

class ResourcesRepository extends BasicEntity implements RepositoryInterface {

    protected $table ='resources';

    protected $primaryKey;

    protected $fillable;

    protected $hidden;

    protected $field_lang = 'resources_lang_code';

    /**
     * ResourcesRepository constructor.
     */
    public function __construct()
    {
        $user = new Resources();
        $this->fillable = $user->getFillable();
        $this->hidden = $user->getHidden();
        $this->primaryKey = $user->getKeyName('primaryKey');
        array_push( $this->fillable,$this->primaryKey);
    }

    /**
     * @param null $pagin
     * @param null $lang
     * @return bool|\Illuminate\Contracts\Pagination\LengthAwarePaginator|\Illuminate\Support\Collection|mixed
     */
    public function all($pagin = null,$lang = [])
    {
        return  $this->findAll($pagin,$lang);
    }

    /**
     * @param $id
     * @return bool|\Illuminate\Database\Eloquent\Model|\Illuminate\Database\Query\Builder|mixed|null|object
     */
    public function find($id)
    {
        return  $this->findOnebyId($id);
    }

    /**
     * @param $data
     * @return bool|mixed
     */
    public function create($data)
    {
        try
        {
            $type = $data['resources_type'];
            $model = $this->UploadResource($data,$type);
            if($model)
            {
                $data["resources_path"] =  $model['path'];
                $data["resources_thumb"] =   $model['path_thumb'];
                $resource = $this->CreateOrUpdate($data);
                if($resource)
                {
                    return true;
                }
            }
            return false;
        }
        catch (Exception $e)
        {
            $this->error = $e->getMessage();
            return false;
        }
    }

    /**
     * @param $data
     * @return bool|mixed
     */
    public function update($data)
    {
        try
        {
            $this->id = $data[$this->primaryKey];
            $type = $data['resources_type'];
            $model = $this->UploadResource($data,$type);
            if($model)
            {
                $data["resources_path"] =  $model['path'];
                $data["resources_thumb"] =   $model['path_thumb'];
                $resource = $this->CreateOrUpdate($data);
                if($resource)
                {
                    return true;
                }
            }
            return false;
        }
        catch (Exception $e)
        {
            $this->error = $e->getMessage();
            return false;
        }
    }

    /**
     * @param null $pagin
     * @param null $lang
     * @return bool|\Illuminate\Support\Collection|mixed
     */
    public function allTrash($pagin = null, $lang = [])
    {
        return  $this->findAllTrash($pagin, $lang);
    }
    public function trash($id, $trash = true)
    {
        try
        {
            $this->id = $id;
            $model = $this->TrashOrRecover($id , $trash);
            if($model)
            {
                return true;
            }
            return false;
        }
        catch (Exception $e)
        {
            $this->error = $e->getMessage();
            return false;
        }
    }

    /**
     * @param $id
     * @return bool|mixed
     */
    public function delete($id)
    {
        try
        {
            $this->id = $id;
            $arrID = [$id];
            $model = $this->DeleteMutilRow($arrID);
            if($model)
            {
                return true;
            }
            return false;
        }
        catch (Exception $e)
        {
            $this->error = $e->getMessage();
            return false;
        }
    }

    /**
     * @return mixed
     */
    public function withErrors()
    {
        if( $this->error !=null)
        {
            $path = storage_path('logs/log.txt');
            $totalLine = count(file($path));
            $cotent = "\r\n #". $totalLine . ' \error: '. $this->error .' at time /t:' . now();
            $this->WriteLog($path,$cotent);
        }
        return $this->error;
    }
}
