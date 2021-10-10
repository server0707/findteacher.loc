<?php

use yii\db\Migration;

/**
 * Class m211010_101841_insert_users_to_user_table
 */
class m211010_101841_insert_users_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert('user',
            [
                'id',
                'username',
                'auth_key',
                'password_hash',
                'email',
                'status',
                'created_at',
                'updated_at',
                'role',
            ],
            [
                [
                    1,
                    'student',
                    '7ZzmYYJRXW.NwaVt8gxtLQ9GKCo9LU2',
                    '$2y$13$zwhB862V3nmO0t0A1yZu.u7ZzmYYJRXW.NwaVt8gxtLQ9GKCo9LU2',
                    'student@mail.ru',
                    10,
                    1633850322,
                    1633850322,
                    'student',
                ],
                [
                    2,
                    'admin',
                    'cEswObjpA0G1N08VbRl8srhVU6vJzHy',
                    '$2y$13$O.WuG3LkpzHw2TeXWkOyMucEswObjpA0G1N08VbRl8srhVU6vJzHy',
                    'admin@admin.admin',
                    10,
                    1633850322,
                    1633850322,
                    'admin',
                ],
                [
                    3,
                    'teacher',
                    'aerwgztaCD.xDyfZCzLD6ssZ9igpQ6.',
                    '$2y$13$StKW6aCw4gMdrGTUmmpRD.aerwgztaCD.xDyfZCzLD6ssZ9igpQ6.',
                    'teacher@mail.ru',
                    10,
                    1633850322,
                    1633850322,
                    'teacher',
                ],
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('user', ['in', 'id', [1, 2, 3]]);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211010_101841_insert_users_to_user_table cannot be reverted.\n";

        return false;
    }
    */
}
