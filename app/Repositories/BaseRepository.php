<?php

namespace App\Repositories;

class BaseRepository
{
    static $model = User::class;

    public static function count()
    {
        return (static::$model)::count();
    }

    public static function exists(int $id) 
    {
        return (static::$model)::where('id', $id)->exists();
    }

    public static function existsByHid(string $hid) 
    {
        return (static::$model)::where('hid', $hid)->exists();
    }

    public static function first() 
    {
        return (static::$model)::first();
    }

    public static function firstById(int $id, array $columns = ['*']) 
    {
        return (static::$model)::where('id', $id)->first($columns);
    }

    public static function firstByIdWith(int $id, array $with, array $columns = ['*']) 
    {
        return (static::$model)::where('id', $id)->with($with)->first($columns);
    }

    public static function firstByHid(string $hid, array $columns = ['*']) 
    {
        return (static::$model)::where('hid', $hid)->first($columns);
    }

    public static function firstByHidWith(string $hid, array $with, array $columns = ['*']) 
    {
        return (static::$model)::where('hid', $hid)->with($with)->first($columns);
    }

    public static function findHidById(int $id) 
    {
        return (static::$model)::whereId($id)->first(['hid'])->hid;
    }

    public static function findIdByHid(string $hid) 
    {
        return (static::$model)::where('hid', $hid)->first(['id'])->id;
    }

    public static function get(array $columns = ['*']) 
    {
        return (static::$model)::get($columns);
    }

    public static function getWith(array $with, array $columns = ['*']) 
    {
        return (static::$model)::with($with)->get($columns);
    }

    public static function firstOrNew(array $data) 
    {
        return (static::$model)::firstOrNew($data);
    }

    public static function firstOrCreate(array $data) 
    {
        return (static::$model)::firstOrCreate($data);
    }

    public static function create(array $data) 
    {
        return (static::$model)::create($data);
    }

    public static function updateById(int $id, array $data) 
    {
        return (static::$model)::where('id', $id)->update($data);
    }

    public static function updateByHid(string $hid, array $array) 
    {
        return (static::$model)::where('hid', $hid)->update($array);
    }

    public static function paginateWith(array $with, int $n = 15) 
    {
        return (static::$model)::with($with)->paginate($n);
    }

    public static function deleteById(int $id) 
    {
        return (static::$model)::where('id', $id)->delete();
    }

    public static function deleteByHid(string $hid) 
    {
        return (static::$model)::where('hid', $hid)->delete();
    }
}
