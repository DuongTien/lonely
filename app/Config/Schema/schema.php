<?php 
class AppSchema extends CakeSchema {

	public function before($event = array()) {
		return true;
	}

	public function after($event = array()) {
        App::uses('ClassRegistry', 'Utility');
        if(isset($event['create']))
        {
            switch ($event['create'])
            {
                case 'users':
                    $user = ClassRegistry::init('User');
                    $user->create();
                    $user->save(
                        array
                        (
                            'User' => array
                            (
                                'email' => 'tiendv@hiworld.com.vn',
                                'password' => '12345678',
                                'first_name' => 'DV',
                                'last_name' => 'Tien',
                                'group' => 1,
                                'active'=>1
                            )
                        )
                    );
                    break;
            }
        }
	}

    public $users = array
    (
        'id' => array('type' => 'biginteger', 'null' => false, 'length' => 20, 'key' => 'primary'),
        'email' => array('type' => 'string', 'null' => false, 'unique' => true),
        'password' => array('type' => 'string', 'null' => true),
        'avatar' => array('type' => 'string','length'=>255),
        'first_name' => array('type' => 'string', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'last_name' => array('type' => 'string', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'birthdate' => array('type' => 'date'),
        'group' => array('type' => 'integer', 'length' => '1', 'comment' => '1.Admin - 2.Member'),
        'gender' => array('type' => 'integer', 'length' => '1', 'comment' => '1: Male, 2: Female'),
        'active' => array('type' => 'boolean', 'default' => true),
        'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
    );

}
