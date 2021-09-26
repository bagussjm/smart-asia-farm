# E-Ticket Asia Farm API Spec v1.0.0

## Description

Keranjang API Spec

## Authentication

No authentication needed to use this API

## Create Keranjang

Request :
- Method : POST
- Endpoint : `/api/keranjang/create`
- Header :
    - Content-Type: application/json
    - Accept: application/json
- Body :

```json 
{
      "id_user" : "bigint",
      "id_wahana" : "bigint",
}
```

Response :

```json 
{
    "code" : "number",
    "status" : "string",
    "data" : {
        "id" : "bigint,unique",
        "id_user" : "bigint",
        "id_wahana" : "bigint",
        "id_tiket" : "string",
        "status_keranjang" : "enum['belum diproses','diproses']",
        "created_at" : "timestamps",
        "updated_at" : "timestamps",
        "deleted_at" : "timestamps",
     }
}
```

## Get Keranjang

Request :
- Method : GET
- Endpoint : `/api/keranjang/{id}`
- Header :
    - Accept: application/json
Response :

```json 
{
    "code" : "number",
    "status" : "string",
    "data" : {
          "id" : "bigint,unique",
          "id_user" : "bigint",
          "id_wahana" : "bigint",
          "id_tiket" : "string",
          "status_keranjang" : "enum['belum diproses','diproses']",
          "created_at" : "timestamps",
          "updated_at" : "timestamps",
          "deleted_at" : "timestamps",
     }
}
```

## Update Keranjang

Request :
- Method : PUT
- Endpoint : `/api/keranjang/{id}`
- Header :
    - Content-Type: application/json
    - Accept: application/json
- Body :

```json 
{
    "id_user" : "bigint",
    "id_wahana" : "bigint",
    "id_tiket" : "string",
    "status_keranjang" : "enum['belum diproses','diproses']",
}
```

Response :

```json 
{
    "code" : "number",
    "status" : "string",
    "data" : {
         "id" : "bigint,unique",
         "id_user" : "bigint",
         "id_wahana" : "bigint",
         "id_tiket" : "string",
         "status_keranjang" : "enum['belum diproses','diproses']",
         "created_at" : "timestamps",
         "updated_at" : "timestamps",
         "deleted_at" : "timestamps",
     }
}
```

## List Keranjang

Request :
- Method : GET
- Endpoint : `/api/keranjang`
- Header :
    - Accept: application/json
- Query Param :
    - size : number,
    - page : number

Response :

```json 
{
    "code" : "number",
    "status" : "string",
    "data" : [
        {
           "id" : "bigint,unique",
           "id_user" : "bigint",
           "id_wahana" : "bigint",
           "id_tiket" : "string",
           "status_keranjang" : "enum['belum diproses','diproses']",
           "created_at" : "timestamps",
           "updated_at" : "timestamps",
           "deleted_at" : "timestamps",
           "user" : {
                 "id" : "bigint,unique",
                 "email" : "string",
                 "jenis_pengguna" : "enum['admin','pengelola','pelanggan']",
                 "nama_lengkap" : "string",
                 "no_hp" : "string",
                 "alamat" : "text",
                 "jenis_kelamin" : "enum['laki-laki','perempuan']",
                 "tanggal_lahir" : "date",
                 "tempat_lahir" : "string",
                 "created_at" : "timestamps",
                 "updated_at" : "timestamps",
                 "deleted_at" : "timestamps",
           },
           "wahana" : {
                 "id" : "bigint,unique",
                  "nama_wahana" : "string",
                  "deskripsi_wahana" : "text",
                  "profil_wahana" : "text",
                  "gambar_wahana" : [
                       "text",
                       "text",
                   ],
                  "tarif_tiket" : "integer",
                  "masa_aktif" : "string",
                  "syarat_ketentuan" : "text",
                  "created_at" : "timestamps",
                  "updated_at" : "timestamps",
                  "deleted_at" : "timestamps",
           },
           "tiket" : {
                  "id" : "string,unique",
                   "tanggal_masuk" : "date",
                   "jam_masuk" : "time",
                   "status" : "enum['pending','success','failed']",
                   "total_bayar" : "integer",
                   "kode_qr" : "text",
                   "created_at" : "timestamps",
                   "updated_at" : "timestamps",
                   "deleted_at" : "timestamps",
           }
        },
        {
           "id" : "bigint,unique",
           "id_user" : "bigint",
           "id_wahana" : "bigint",
           "id_tiket" : "string",
           "status_keranjang" : "enum['belum diproses','diproses']",
           "created_at" : "timestamps",
           "updated_at" : "timestamps",
           "deleted_at" : "timestamps",
           "user" : {
                 "id" : "bigint,unique",
                 "email" : "string",
                 "jenis_pengguna" : "enum['admin','pengelola','pelanggan']",
                 "nama_lengkap" : "string",
                 "no_hp" : "string",
                 "alamat" : "text",
                 "jenis_kelamin" : "enum['laki-laki','perempuan']",
                 "tanggal_lahir" : "date",
                 "tempat_lahir" : "string",
                 "created_at" : "timestamps",
                 "updated_at" : "timestamps",
                 "deleted_at" : "timestamps",
           },
           "wahana" : {
                 "id" : "bigint,unique",
                  "nama_wahana" : "string",
                  "deskripsi_wahana" : "text",
                  "profil_wahana" : "text",
                  "gambar_wahana" : [
                       "text",
                       "text",
                   ],
                  "tarif_tiket" : "integer",
                  "masa_aktif" : "string",
                  "syarat_ketentuan" : "text",
                  "created_at" : "timestamps",
                  "updated_at" : "timestamps",
                  "deleted_at" : "timestamps",
           },
           "tiket" : {
                  "id" : "string,unique",
                   "tanggal_masuk" : "date",
                   "jam_masuk" : "time",
                   "status" : "enum['pending','success','failed']",
                   "total_bayar" : "integer",
                   "kode_qr" : "text",
                   "created_at" : "timestamps",
                   "updated_at" : "timestamps",
                   "deleted_at" : "timestamps",
           }
        },
    ]
}
```

## Delete Keranjang

Request :
- Method : DELETE
- Endpoint : `/api/keranjang/id`
- Header :
    - Accept: application/json

Response :

```json 
{
    "code" : "number",
    "status" : "string"
}
```

## Cek Wahana in Keranjang

Description : 
Check if the current wahana has been added to keranjang

Request : 
- Method : POST
- Endpoint : `/api/keranjang/inCart`
- Header : 
    - Content-Type: application/json
    - Accept: application/json
- Body : 

```json
{
  "id_user" : "bigint",
  "id_wahana" : "bigint"
}
```

Response : 

```json
{
  "code" : "number",
  "status" : "string",
  "data" : "boolean"
}   
```

## Checkout Keranjang

Description : 
Checkout all wahana in user chart if `Midtrans TransactionResult.getStatus() === TransactionResult.STATUS_SUCCESS`

Request : 
- Method : POST
- Endpoint : `/api/keranjang/checkout`
- Header : 
    - Content-Type: application/json
    - Accept: application/json
- Body : 

```json
{
  "order_id" : "string",
  "user_id" : "bigint",
  "book_date" : "date",
  "book_time" : "time"
}
```

Response : 

```json
{
  "code" : "number",
  "status" : "string",
  "data" : {
      "order_id" : "string",
      "gross_amount" : "integer",
      "payment_type" : "string"
  }
}   
```
