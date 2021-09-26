<?php
namespace Sinarajabpour1998\AclManager\Repositories;

class UserRepository
{

    public function userFieldsEncryption($user)
    {
        if (config('acl-manager.encryption.mobile_encryption')){
            if (decryptString($user->mobile) == 'already_decrypted'){
                $user->mobile = encryptString($user->mobile);
                $user->mobile_key = makeHash(decryptString($user->mobile));
            }
        }
        if (config('acl-manager.encryption.email_encryption')){
            if (decryptString($user->email) == 'already_decrypted'){
                $user->email = encryptString($user->email);
                $user->email_key = makeHash(decryptString($user->email));
            }
        }
        if (config('acl-manager.encryption.city_encryption')){
            if (decryptString($user->city) == 'already_decrypted'){
                $user->city = encryptString($user->city);
            }
        }
        if (config('acl-manager.encryption.postal_code_encryption')){
            if (decryptString($user->postal_code) == 'already_decrypted'){
                $user->postal_code = encryptString($user->postal_code);
            }
        }
        if (config('acl-manager.encryption.address_encryption')){
            if (decryptString($user->address) == 'already_decrypted'){
                $user->address = encryptString($user->address);
            }
        }
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
