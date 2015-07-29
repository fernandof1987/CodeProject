<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 29/07/15
 * Time: 00:00
 */

namespace CodeProject\Repositories;

use CodeProject\Entities\Client;
use Prettus\Repository\Eloquent\BaseRepository;

class ClientRepositoryEloquent extends BaseRepository implements ClientRepository
{
    public function model()
    {
        return Client::class;
    }
}