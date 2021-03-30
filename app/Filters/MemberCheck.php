<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class MemberCheck implements FilterInterface
{
    public function before(RequestInterface $request)
    {
        // If segment 1 == login
        // We have to redirect the request to the second segment

        $uri = service('uri');
        if ($uri->getSegment(1) == 'login') {
            if ($uri->getSegment(2) == '')
                $segment = '/';
            else
                $segment = '/'.$uri->getSegment(2);

            return redirect()->to($segment);
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response) {
        // Do something
    }
}
