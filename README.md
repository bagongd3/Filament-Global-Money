# 💸 Filament Global Money

Plugin Laravel Filament untuk menangani format mata uang (currency) secara seragam di seluruh aplikasi Anda.  
Cocok untuk form input, tabel, dan tampilan data (infolist).

---

## 🚀 Fitur Utama

✅ **TextInput** dengan prefix/suffix otomatis (contoh: `Rp`)  
✅ **TextColumn** pada tabel dengan format ribuan dan desimal  
✅ **Infolist Entry** (detail view) dengan format uang  
✅ **Dapat dikonfigurasi**: simbol mata uang, pemisah ribuan/desimal, jumlah digit desimal

---

## 📦 Instalasi

```bash
composer require bagongd3/filament-global-money
````

### Publikasi konfigurasi (opsional)

```bash
php artisan vendor:publish --tag=global-money-config
```

---

## ⚙️ Konfigurasi

File konfigurasi: `config/global-money.php`

```php
return [
    'prefix' => 'Rp',              // Simbol mata uang di awal
    'suffix' => '',                // Jika ingin ada di akhir (contoh: "IDR")
    'decimal_separator' => ',',    // Simbol desimal
    'thousands_separator' => '.', // Simbol ribuan
    'decimals' => 2,               // Jumlah digit desimal
];
```

---

## ✍️ Cara Menggunakan

### 📋 Text Input (Form)

```php
use Vendor\\GlobalMoney\\Forms\\Components\\MoneyInput;

MoneyInput::make('price'),
```

### 📊 Text Column (Tabel)

```php
use Vendor\\GlobalMoney\\Tables\\Columns\\MoneyColumn;

MoneyColumn::make('amount'),
```

### 📎 Infolist Entry (Detail)

```php
use Vendor\\GlobalMoney\\Infolists\\Components\\MoneyEntry;

MoneyEntry::make('total'),
```

---

## 📐 Format Otomatis

| Nilai Asli | Output         |
| ---------- | -------------- |
| `10000`    | `Rp 10.000`    |
| `12500.75` | `Rp 12.500,75` |
| `null`     | `-`            |

---


## 🙏 Kredit

Dikembangkan dengan 🤖 oleh [234Creation](https://github.com/234Creation)