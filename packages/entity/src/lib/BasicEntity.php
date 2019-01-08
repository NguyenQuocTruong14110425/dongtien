<?php namespace Entity\Lib;

use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

abstract class BasicEntity
{
    protected  $entity;

    protected  $id;

    protected $error;

    protected $lang_code;


    /**
     * @param array $attributes
     * @return bool
     */
    public function CreateOrUpdate(array $attributes)
    {
        try {
            $data = [];
            foreach ($this->fillable as $key => $value) {
                if (isset($attributes[$value])) {
                    $data[$value] = $attributes[$value];
                }
            }
            if (isset($data[$this->primaryKey]) == false) {
                $data['created_at'] =  now();
                $flag = DB::table($this->table)->insertGetId($data);
                    $this->id = $flag;
            } else {
                $data['updated_at'] = now();
                $this->id = $data[$this->primaryKey];
                $flag = DB::table($this->table)
                    ->where($this->primaryKey, $this->id)
                    ->update($data);
            }
            if ($flag>0) {
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
     * @param array $arrId
     * @param array $attributes
     * @return bool
     */
    public function CreateOrUpdateMutilRow(array $arrId,array $attributes)
    {
        try
        {
            if (empty($arrId) == true) {
                foreach ($attributes as $key=>$value)
                {
                    $value['created_at'] =  now();
                    $attributes[$key] = $value;
                }
                DB::table($this->table)->insert($attributes);
                return true;
            } else if(empty($table) == false && empty($arrId) == false)
                {
                    foreach ($attributes as $key=>$value)
                    {
                        $value['updated_at'] =  now();
                        $attributes[$key] = $value;
                    }
                    foreach ($arrId as $index=>$nodeValue)
                    {
                        $query = DB::table($this->table)->where($this->primaryKey,$nodeValue)->update($attributes[$index]);
                        if($query == false)
                        {
                            return false;
                        }
                    }
                    return true;
            }
            else
            {
                $this->error = 'Can run query update or insert';
                return false;
            }
        }
        catch (Exception $e)
        {
            $this->error = $e->getMessage();
            return false;
        }
    }

    /**
     * @param array $attributes
     * @return bool
     */
    public function CreateMutilRow(array $attributes)
    {
        try
        {
            if (empty($table) == false) {
                foreach ($attributes as $key=>$value)
                {
                   $value['created_at'] =  now();
                   $attributes[$key] = $value;
                }
                DB::table($this->table)->insert($attributes);
                return true;
            } else {
                $this->error = 'Can find name table insert';
                return false;
            }
        }
        catch (Exception $e)
        {
            $this->error = $e->getMessage();
            return false;
        }
    }

    /**
     * @param array $arrId
     * @param array $attributes
     * @return bool
     */
    public function UpdateMutilRow(array $arrId,array $attributes)
    {
        try
        {
            if (empty($arrId) == false) {
                foreach ($attributes as $key=>$value)
                {
                    $value['updated_at'] =  now();
                    $attributes[$key] = $value;
                }
                foreach ($arrId as $index=>$nodeValue)
                {
                    $query = DB::table($this->table)->where($this->primaryKey,$nodeValue)->update($attributes[$index]);
                    if($query == false)
                    {
                        return false;
                    }
                }
                return true;
            } else {
                $this->error = 'name table or id not found for update';
                return false;
            }
        }
        catch (Exception $e)
        {
            $this->error = $e->getMessage();
            return false;
        }
    }

    public function UploadResource($resource,$type)
    {
        try {
            $file = $resource;
            $pathSave = base_path('/public/upload/' . $type);
            $fileName = time() . '_' .$file->getClientOriginalName();
            $file->move($pathSave, $fileName);
            $result = $type . '/'. $fileName;
            return $result;
        }
        catch (Exception $e)
        {
            $this->error = $e->getMessage();
            dd($this->error);
            return false;
        }
    }

    public function DeleteResource($fileName)
    {
        $pathImage = base_path('/public/upload/' . $fileName);
        if (File::exists($pathImage)) {
            //File::delete($image_path);
            unlink($pathImage);
        }
    }
    /**
     * @param array $arrID
     * @return bool
     */

    public function DeleteMutilRow(array $arrID, $filename = null)
    {
        try
        {
            if (isset($arrID) &&  count($arrID) > 0) {
                $path = storage_path('logs/delete.txt');
                $totalLine = count(file($path));
                $cotent = "\r\n #". $totalLine . ':delete row from '. $this->primaryKey .' /id:' .implode(",", $arrID) .' from table /tb:' .$this->table .' at time /t:' . now();
                $query = DB::table($this->table)
                    ->where('IsDelete','=',1)
                    ->whereIn($this->primaryKey,$arrID)
                    ->delete();
                if(isset($filename))
                {
                    $this->DeleteResource($filename);
                }
                if($query == true)
                {
                    $this->WriteLog($path,$cotent);
                    return true;
                }
                return false;
            } else {
                $this->error = 'id of table '. $this->table .'not found for delete';
                return false;
            }
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
     * @return bool|\Illuminate\Contracts\Pagination\LengthAwarePaginator|\Illuminate\Support\Collection
     */
    public function findAll($pagin = null,$lang = [])
    {
        try
        {
            if(empty($pagin) == false)
            {
                $result = DB::table($this->table)
                    ->where('IsDelete','=',0)
                    ->paginate($pagin);
            }
            else
            {
                $result = DB::table($this->table)
                    ->where('IsDelete','=',0)
                    ->get();
            }
            return $result;
        }
        catch (Exception $e)
        {
            $this->error = $e->getMessage();
            dd($this->error);

            return false;
        }
    }

    /**
     * @return bool|\Illuminate\Support\Collection
     */
    public function findAllTrash($pagin = null,$lang = [])
    {
        try
        {
            if(empty($pagin) == false)
            {
                $result = DB::table($this->table)
                    ->where('IsDelete',1)
                    ->paginate($pagin);
            }
            else
            {
                $result = DB::table($this->table)
                    ->where('IsDelete',1)
                    ->get();
            }
            return $result;
        }
        catch (Exception $e)
        {
            $this->error = $e->getMessage();
            return false;
        }
    }
    /**
     * @param $id: is id need find
     * @return bool|Model|\Illuminate\Database\Query\Builder|null|object
     */
    public function findOnebyId($id)
    {
        try
        {
            if (empty($id) == false ) {
                $result = DB::table($this->table)
                    ->where($this->primaryKey,$id)
                    ->first();
                return $result;
            } else {
                $this->error = 'Id can not null!';
                return false;
            }
        }
        catch (Exception $e)
        {
            $this->error = $e->getMessage();
            return false;
        }
    }

    /**
     * @param $table: name table
     * @param $keyFiled: key condition field
     * @param array $Attributes: value condition
     * @return bool|\Illuminate\Support\Collection
     */
    public function findMany($keyFiled, array $Attributes)
    {
        try
        {
            if ( empty($Attributes) == false && empty($keyFiled) == false ) {

                $result = DB::table($this->table)
                    ->whereIn($keyFiled,$Attributes)
                    ->get();
                return $result;
            } else {
                $this->error = 'field or attributes can not null!';
                return false;
            }
        }
        catch (Exception $e)
        {
            $this->error = $e->getMessage();
            return false;
        }
    }
    public function TrashOrRecover($id,$trash = true)
    {
        try
        {
            if ( empty($id) == false ) {
                if($trash == true)
                {
                    $data['IsDelete'] = '1';
                }
                else
                {
                    $data['IsDelete'] = '0';
                }
                $data['updated_at'] = now();
                $flag = DB::table($this->table)
                    ->where($this->primaryKey, $id)
                    ->update($data);
                if($flag == true)
                {
                    return true;
                }
                return false;

            } else {
                $this->error = 'id or table can not null!';
                return false;
            }
        }
        catch (Exception $e)
        {
            $this->error = $e->getMessage();
            return false;
        }
    }
    public function WriteLog($file,$content)
    {
        $f = fopen($file,"a+");
        file_put_contents($file,$content,FILE_APPEND);
        fclose($f);
    }
}
