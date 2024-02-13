<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    private $triggerName = 'trigger_anak_delete';
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared("
            CREATE TRIGGER trigger_anak_insert
            AFTER INSERT ON anaks FOR EACH ROW
            BEGIN
                -- Get the username from 'kepala_keluargas'
                DECLARE v_username VARCHAR(50);
                SELECT username INTO v_username FROM kepala_keluargas WHERE no_kk = NEW.no_kk LIMIT 1;

                -- Insert into 'logs'
                INSERT INTO logs (action, log, username, created_at)
                VALUES ('INSERT', 
                    CONCAT(
                        'id_anak: ', NEW.id_anak,
                        ', no_kk: ', NEW.no_kk,
                        ', nama_anak: ', NEW.nama_anak,
                        ', tanggal_lahir: ', NEW.tanggal_lahir,
                        ', jenis_kelamin: ', NEW.jenis_kelamin,
                        ', nama_orangtua: ', NEW.nama_orangtua,
                        ', anak_ke: ', NEW.anak_ke,
                        ', alamat: ', NEW.alamat
                    ),
                    v_username,
                    NOW());
            END;
        ");

        DB::unprepared("
            CREATE TRIGGER trigger_anak_update
            AFTER UPDATE ON anaks FOR EACH ROW
            BEGIN
                DECLARE v_username VARCHAR(50);
                SELECT username INTO v_username FROM kepala_keluargas WHERE no_kk = NEW.no_kk LIMIT 1;
                INSERT INTO logs (action, log, username, created_at)
                VALUES ('UPDATE', 
                    CONCAT(
                        'id_anak: ', NEW.id_anak,
                        ', no_kk: ', NEW.no_kk,
                        ', nama_anak: ', NEW.nama_anak,
                        ', tanggal_lahir: ', NEW.tanggal_lahir,
                        ', jenis_kelamin: ', NEW.jenis_kelamin,
                        ', nama_orangtua: ', NEW.nama_orangtua,
                        ', anak_ke: ', NEW.anak_ke,
                        ', alamat: ', NEW.alamat
                    ),
                    v_username,
                    NOW());
            END;
        ");     

        DB::unprepared("
            CREATE TRIGGER trigger_anak_delete
            AFTER DELETE ON anaks FOR EACH ROW
            BEGIN
                -- Get the username from 'kepala_keluargas'
                DECLARE v_username VARCHAR(50);
                SELECT username INTO v_username FROM kepala_keluargas WHERE no_kk = OLD.no_kk LIMIT 1;

                -- Insert into 'logs'
                INSERT INTO logs (action, log, username, created_at)
                VALUES ('DELETE', 
                    CONCAT(
                        'id_anak: ', OLD.id_anak,
                        ', no_kk: ', OLD.no_kk,
                        ', nama_anak: ', OLD.nama_anak,
                        ', tanggal_lahir: ', OLD.tanggal_lahir,
                        ', jenis_kelamin: ', OLD.jenis_kelamin,
                        ', nama_orangtua: ', OLD.nama_orangtua,
                        ', anak_ke: ', OLD.anak_ke,
                        ', alamat: ', OLD.alamat
                    ),
                    v_username,
                    NOW());
            END;
        ");
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared("DROP TRIGGER IF EXISTS trigger_anak_insert");
        DB::unprepared("DROP TRIGGER IF EXISTS trigger_anak_update");
        DB::unprepared("DROP TRIGGER IF EXISTS trigger_anak_delete");
    }
};
