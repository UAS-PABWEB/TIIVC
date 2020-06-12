<?php

use App\Models\Customer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

function avatar($path=null)
{
    if (Storage::exists($path)) {
        return Storage::url($path);
    }

    if (filter_var($path, FILTER_VALIDATE_URL)) {
        return $path;
    } else {
        return asset('img/avatar0.png');
    }
}

function debt_status($status)
{
    $class  = ($status == 0) ? 'text-danger' : 'text-success';
    $status = ($status == 0) ? 'Belum dibayar' : 'Lunas';

    return "<span class=$class>$status</span>";
}

function rupiah($nominal, $decimals = 0)
{
    return 'Rp' . number_format($nominal, $decimals, ',', '.');
}

function tgl_indo($tanggal, $format = 'd-m-Y', $separator = '-')
{
    $bulan =  config('constant.bulan');
    $tanggal = date($format, strtotime($tanggal));
    $pecahkan = explode($separator, $tanggal);

    return $pecahkan[0] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[2];
}

function total_debt(Customer $customer)
{
    $totalDebt = DB::table('customer_debts')
                ->where([
                    ['customer_id', $customer->id],
                    ['status', 0],
                ])
                ->sum('nominal');

    return rupiah($totalDebt);
}
