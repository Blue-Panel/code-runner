<?php


namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Automations extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'description' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'script_name' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'schedule_time' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'schedule_date' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['enabled', 'disabled'],
                'default' => 'disabled',
            ],
            'last_run' => [
                'type' => 'TIMESTAMP',
                'null' => true
            ],
            'created_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
                'default' => new \CodeIgniter\Database\RawSql('CURRENT_TIMESTAMP'),
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('automations');
    }

    public function down()
    {
        $this->forge->dropTable('automations');
    }
}
