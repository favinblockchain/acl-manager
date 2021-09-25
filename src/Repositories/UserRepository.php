<?php
namespace Sinarajabpour1998\AclManager\Repositories;

class UserRepository
{

    public function userFieldsEncryption($user)
    {
        if (config('acl-manager.encryption.mobile_encryption')){
            $user->mobile = encryptString($user->mobile);
            $user->mobile_key = makeHash($user->mobile);
        }else{
            $user->mobile = $user->mobile;
            $user->mobile_key = 'nan';
        }
        if (config('acl-manager.encryption.email_encryption')){
            $user->email = encryptString($user->email);
            $user->email_key = makeHash($user->email);
        }else{
            $user->email = $user->email;
            $user->email_key = 'nan';
        }
        if (config('acl-manager.encryption.city_encryption')){
            $user->city = encryptString($user->city);
        }else{
            $user->city = $user->city;
        }
        if (config('acl-manager.encryption.postal_code_encryption')){
            $user->postal_code = encryptString($user->postal_code);
        }else{
            $user->postal_code = $user->postal_code;
        }
        if (config('acl-manager.encryption.address_encryption')){
            $user->address = encryptString($user->address);
        }else{
            $user->address = $user->address;
        }
        $user->saveQuietly();
    }

    public function userFieldsDecryption($user)
    {
        if (config('acl-manager.encryption.mobile_encryption')){
            $user->mobile = decryptString($user->mobile);
        }
        if (config('acl-manager.encryption.email_encryption')){
            $user->email = decryptString($user->email);
        }
        if (config('acl-manager.encryption.city_encryption')){
            $user->city = decryptString($user->city);
        }
        if (config('acl-manager.encryption.postal_code_encryption')){
            $user->postal_code = decryptString($user->postal_code);
        }
        if (config('acl-manager.encryption.address_encryption')){
            $user->address = decryptString($user->address);
        }
    }
}
