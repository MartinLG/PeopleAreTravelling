<?php

namespace PaT\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class PaTUserBundle extends Bundle
{
	public function getParent()
	{
    	return 'FOSUserBundle';
	}
}
