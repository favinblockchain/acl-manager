<?php

namespace Sinarajabpour1998\AclManager\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AclMenu extends Component
{
    /**
     * The type of menu, modules or manager
     * @var
     */
    public $type;

    public function __construct()
    {

    }

    public function render()
    {
        return view('aclManager::components.acl_menu');
    }
}
