<?php
namespace Favinblockchain\AclManager\Repositories;

class UserRepository
{

    public function userFieldsEncryption($user)
    {
        if (config('acl-manager.encryption.mobile_encryption')){
            if (decryptString($user->mobile) == 'already_decrypted' && !is_null($user->mobile) && $user->mobile != ''){
                $user->mobile = encryptString($user->mobile);
                $user->mobile_key = makeHash(decryptString($user->mobile));
            }
        }
        if (config('acl-manager.encryption.email_encryption')){
            if (decryptString($user->email) == 'already_decrypted' && !is_null($user->email) && $user->email != ''){
                $user->email = encryptString($user->email);
                $user->email_key = makeHash(decryptString($user->email));
            }
        }
        if (config('acl-manager.encryption.city_encryption')){
            if (decryptString($user->city) == 'already_decrypted' && !is_null($user->city) && $user->city != ''){
                $user->city = encryptString($user->city);
            }
        }
        if (config('acl-manager.encryption.postal_code_encryption')){
            if (decryptString($user->postal_code) == 'already_decrypted' && !is_null($user->postal_code) && $user->postal_code != ''){
                $user->postal_code = encryptString($user->postal_code);
            }
        }
        if (config('acl-manager.encryption.address_encryption')){
            if (decryptString($user->address) == 'already_decrypted' && !is_null($user->address) && $user->address != ''){
                $user->address = encryptString($user->address);
            }
        }
        if (config('acl-manager.encryption.organization_encryption')){
            if (decryptString($user->organization) == 'already_decrypted' && !is_null($user->organization) && $user->organization != ''){
                $user->organization = encryptString($user->organization);
            }
        }
    }

    public function userFieldsDecryption($user)
    {
        if (config('acl-manager.encryption.mobile_encryption')){
            if (!is_null($user->mobile) && $user->mobile != ''){
                $user->mobile = decryptString($user->mobile);
            }
        }
        if (config('acl-manager.encryption.email_encryption')){
            if (!is_null($user->email) && $user->email != ''){
                $user->email = decryptString($user->email);
            }
        }
        if (config('acl-manager.encryption.city_encryption')){
            if (!is_null($user->city) && $user->city != ''){
                $user->city = decryptString($user->city);
            }
        }
        if (config('acl-manager.encryption.postal_code_encryption')){
            if (!is_null($user->postal_code) && $user->postal_code != ''){
                $user->postal_code = decryptString($user->postal_code);
            }
        }
        if (config('acl-manager.encryption.address_encryption')){
            if (!is_null($user->address) && $user->address != ''){
                $user->address = decryptString($user->address);
            }
        }
        if (config('acl-manager.encryption.organization_encryption')){
            if (!is_null($user->organization) && $user->organization != ''){
                $user->organization = decryptString($user->organization);
            }
        }
    }
}
