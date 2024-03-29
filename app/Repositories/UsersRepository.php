<?php

namespace Corp\Repositories;

use Corp\User;
use Corp\Role;
use Gate;

class UsersRepository extends Repository {

    public function __construct(User $user) {
      $this->model = $user;
    }

    public function addUser($reuqest) {
        $data = $request->all();

        $user = $this->model->create([
          'name' => $data['name'],
            'login' => $data['login'],
              'email' => $data['email'],
                'password' => bcrypt($data['password'])
        ]);

        if($user) {
          $user->roles()->attach($data['role_id']);
        }
        return ['status' => 'Пользователь добавлен'];
    }

    public function updateArticle($request, $user)
    {


      $data = $request->all();

      if(isset($data['password']) {
        $data['password'] = bcrypt($data['password']);
      }
      $user->fill($data)->update();
      $user->roles()->sync([$data['role_id']]);

        return ['status' => 'Пользователь изменен'];
      }

      public function deleteUser($user) {
          $user->roles()->detach();
          if($user->delete()) {
            return ['status' => 'Пользователь удален'];
          }
      }

}
 ?>
