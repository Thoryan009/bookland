<?php

namespace App\Models;


use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Seller extends Authenticatable
{
    use Notifiable;

    protected $guard = 'seller';

    public static $seller, $image, $imageName, $imageUrl, $directory;

    public static function getImageUrl($request)
    {
        self::$image = $request['image'];
        self::$imageName = self::$image->getClientOriginalName();
        self::$directory = 'upload/seller-images/';
        self::$image->move(self::$directory, self::$imageName);
        self::$imageUrl = self::$directory . self::$imageName;

        return self::$imageUrl;
    }

    public static function newSeller($request)
    {
      
        self::$seller = new Seller();

        if (isset($request['image'])) {
            self::$seller->image = self::getImageUrl($request);
        }

        if (isset($request['blood_group'])) {
            self::$seller->blood_group = $request['blood_group'];
        }


        if (isset($request['date_of_birth'])) {
            self::$seller->date_of_birth = $request['date_of_birth'];
        }

        if (isset($request['address'])) {
            self::$seller->address = $request['address'];
        }

        self::$seller->name = $request['name'];
        self::$seller->email = $request['email'];
        self::$seller->password = bcrypt($request['password']);
        self::$seller->mobile = $request['mobile'];
        self::$seller->save();

        return self::$seller;
    }

    public static function updateSeller($request, $id)
    {
        self::$seller = Seller::find($id);

        
        if ($request->file('image')) {
            self::$seller->image = self::getImageUrl($request);
        }

        if ($request->blood_group) {
            self::$seller->blood_group = $request->blood_group;
        }


        if ($request->date_of_birth) {
            self::$seller->date_of_birth = $request->date_of_birth;
        }

        if ($request->address) {
            self::$seller->address = $request->address;
        }

        self::$seller->name = $request->name;
        self::$seller->email = $request->email;
        self::$seller->password = bcrypt($request->password);
        self::$seller->mobile = $request->mobile;
        self::$seller->save();

    } 
}
