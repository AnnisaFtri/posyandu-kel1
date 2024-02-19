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
                SELECT id_user INTO v_username FROM kepala_keluargas WHERE no_kk = NEW.no_kk LIMIT 1;

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
                SELECT id_user INTO v_username FROM kepala_keluargas WHERE no_kk = NEW.no_kk LIMIT 1;
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
                SELECT id_user INTO v_username FROM kepala_keluargas WHERE no_kk = OLD.no_kk LIMIT 1;

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

        //

        DB::unprepared("
        CREATE TRIGGER trigger_pemeriksaan_insert
        AFTER INSERT ON pemeriksaans FOR EACH ROW
        BEGIN
            -- Get the username from 'kepala_keluargas'
            DECLARE v_username VARCHAR(50);
            SELECT id_anak INTO v_username FROM anaks WHERE id_anak = NEW.id_anak LIMIT 1;

            -- Insert into 'logs'
            INSERT INTO logs (action, log, username, created_at)
            VALUES ('INSERT', 
                CONCAT(
                    'id_pemeriksaan: ', NEW.id_pemeriksaan,
                    ', id_anak : ', NEW.id_anak,
                    ', nama_anak: ', NEW.nama_anak,
                    ', tanggal_pemeriksaan: ', NEW.tanggal_pemeriksaan,
                    ', usia: ', NEW.usia,
                    ', berat_badan: ', NEW.berat_badan,
                    ', tinggi_badan: ', NEW.tinggi_badan,
                    ', lingkar_kepala: ', NEW.lingkar_kepala,
                    ', status_gizi: ', NEW.status_gizi,
                    ', saran: ', NEW.saran
                ),
                v_username,
                NOW());
        END;
    ");

    DB::unprepared("
        CREATE TRIGGER trigger_pemeriksaan_update
        AFTER UPDATE ON pemeriksaans FOR EACH ROW
        BEGIN
            DECLARE v_username VARCHAR(50);
            SELECT id_anak INTO v_username FROM anaks WHERE id_anak = NEW.id_anak LIMIT 1;
            INSERT INTO logs (action, log, username, created_at)
            VALUES ('UPDATE', 
                CONCAT(
                    'id_pemeriksaan: ', NEW.id_pemeriksaan,
                    ', id_anak : ', NEW.id_anak,
                    ', nama_anak: ', NEW.nama_anak,
                    ', tanggal_pemeriksaan: ', NEW.tanggal_pemeriksaan,
                    ', usia: ', NEW.usia,
                    ', berat_badan: ', NEW.berat_badan,
                    ', tinggi_badan: ', NEW.tinggi_badan,
                    ', lingkar_kepala: ', NEW.lingkar_kepala,
                    ', status_gizi: ', NEW.status_gizi,
                    ', saran: ', NEW.saran
                ),
                v_username,
                NOW());
        END;
    ");     

    DB::unprepared("
        CREATE TRIGGER trigger_pemeriksaan_delete
        AFTER DELETE ON pemeriksaans FOR EACH ROW
        BEGIN
            -- Get the username from 'kepala_keluargas'
            DECLARE v_username VARCHAR(50);
            SELECT id_anak INTO v_username FROM anaks WHERE id_anak = OLD.id_anak LIMIT 1;

            -- Insert into 'logs'
            INSERT INTO logs (action, log, username, created_at)
            VALUES ('DELETE', 
                CONCAT(
                    'id_pemeriksaan: ', OLD.id_pemeriksaan,
                    ', id_anak : ', OLD.id_anak,
                    ', nama_anak: ', OLD.nama_anak,
                    ', tanggal_pemeriksaan: ', OLD.tanggal_pemeriksaan,
                    ', usia: ', OLD.usia,
                    ', berat_badan: ', OLD.berat_badan,
                    ', tinggi_badan: ', OLD.tinggi_badan,
                    ', lingkar_kepala: ', OLD.lingkar_kepala,
                    ', status_gizi: ', OLD.status_gizi,
                    ', saran: ', OLD.saran
                ),
                v_username,
                NOW());
        END;
    ");

    //
    DB::unprepared("
    CREATE TRIGGER trigger_jenis_pelayanan_insert
    AFTER INSERT ON jenis_pelayanans FOR EACH ROW
    BEGIN
        -- Get the username from 'kepala_keluargas'
        DECLARE v_username VARCHAR(50);
        SELECT id_pelayanan INTO v_username FROM jenis_pelayanans LIMIT 1;

        -- Insert into 'logs'
        INSERT INTO logs (action, log, username, created_at)
        VALUES ('INSERT', 
            CONCAT(
                'id_pelayanan: ', NEW.id_pelayanan,
                ', jenis_pelayanan : ', NEW.jenis_pelayanan,
                ', tanggal_pelayanan: ', NEW.tanggal_pelayanan
            ),
            v_username,
            NOW());
    END;
");

DB::unprepared("
    CREATE TRIGGER trigger_jenis_pelayanan_update
    AFTER UPDATE ON jenis_pelayanans FOR EACH ROW
    BEGIN
        DECLARE v_username VARCHAR(50);
        SELECT id_pelayanan INTO v_username FROM jenis_pelayanans LIMIT 1;
        INSERT INTO logs (action, log, username, created_at)
        VALUES ('UPDATE', 
            CONCAT(
                'id_pelayanan: ', NEW.id_pelayanan,
                ', jenis_pelayanan : ', NEW.jenis_pelayanan,
                ', tanggal_pelayanan: ', NEW.tanggal_pelayanan
            ),
            v_username,
            NOW());
    END;
");     

DB::unprepared("
    CREATE TRIGGER trigger_jenis_pelayanan_delete
    AFTER DELETE ON jenis_pelayanans FOR EACH ROW
    BEGIN
        -- Get the username from 'kepala_keluargas'
        DECLARE v_username VARCHAR(50);
        SELECT id_pelayanan INTO v_username FROM jenis_pelayanans LIMIT 1;

        -- Insert into 'logs'
        INSERT INTO logs (action, log, username, created_at)
        VALUES ('DELETE', 
            CONCAT(
                'id_pelayanan: ', OLD.id_pelayanan,
                ', jenis_pelayanan : ', OLD.jenis_pelayanan,
                ', tanggal_pelayanan: ', OLD.tanggal_pelayanan
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
        DB::unprepared("DROP TRIGGER IF EXISTS trigger_pemeriksaan_insert");
        DB::unprepared("DROP TRIGGER IF EXISTS trigger_pemeriksaan_update");
        DB::unprepared("DROP TRIGGER IF EXISTS trigger_pemeriksaan_delete");
        DB::unprepared("DROP TRIGGER IF EXISTS trigger_jenis_pelayanan_insert");
        DB::unprepared("DROP TRIGGER IF EXISTS trigger_jenis_pelayanan_update");
        DB::unprepared("DROP TRIGGER IF EXISTS trigger_jenis_pelayanan_delete");
    }
};
