<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id('id_pinjam');
            $table->integer('id_user');
            $table->integer('id_buku');
            $table->integer('jumlah');
            $table->date('tanggal_pinjam');
            $table->date('tanggal_kembali');
            $table->enum('status', ['pinjam', 'kembali']);
            $table->timestamps();
        });
        DB::unprepared('
            CREATE TRIGGER min_stock
            AFTER INSERT ON peminjaman
            FOR EACH ROW 
            BEGIN
            IF NEW.status = "pinjam" THEN
            UPDATE bukus SET stok = stok - NEW.jumlah WHERE id_buku = NEW.id_buku;
            END IF;
            END;
        ');
        DB::unprepared('
            CREATE TRIGGER add_stock
            AFTER UPDATE ON peminjaman
            FOR EACH ROW 
            BEGIN
            IF NEW.status = "kembali" THEN
            UPDATE bukus SET stok = stok + NEW.jumlah WHERE id_buku = NEW.id_buku;
            END IF;
            END;
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjamen');
    }
};
