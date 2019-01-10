<?php namespace Entity\Repository\Product;

use App\Product;
use Entity\Repository\RepositoryInterface;
use Entity\Lib\BasicEntity;
use Exception;

class ProductRepository extends BasicEntity implements RepositoryInterface {

    protected $table ='products';

    protected $primaryKey;

    protected $fillable;

    protected $hidden;


    public function __construct()
    {
        $user = new Product();
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
            $files = $data["product_avatar"];
            $type = "product";
            if(isset($files))
            {
                $upload = $this->UploadResource($files,$type);
                $data["product_avatar"] = $upload;
            }
            $model = $this->CreateOrUpdate($data);
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
     * @param $data
     * @return bool|mixed
     */
    public function update($data)
    {
        try
        {
            $this->id = $data[$this->primaryKey];
            $files = $data["product_avatar"];
            $type = "product";
            if(isset($files))
            {
                $product = $this->find($this->id);
                $arrID = [$this->id];
                $this->DeleteMutilRow($arrID, $product->product_avatar);
                $upload = $this->UploadResource($files,$type);
                $data["product_avatar"] = $upload;
            }
            $model = $this->CreateOrUpdate($data);
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
     * @param null $pagin
     * @param null $lang
     * @return bool|\Illuminate\Support\Collection|mixed
     */
    public function allTrash($pagin = null, $lang = [])
    {
        return  $this->findAllTrash($pagin, $lang);
    }

    /**
     * @param $id
     * @param bool $trash
     * @return bool|mixed
     */
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
            $product = $this->find($id);
            $model = $this->DeleteMutilRow($arrID, $product->product_avatar);
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
