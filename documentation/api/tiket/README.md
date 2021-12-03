# E-Ticket Asia Farm API Spec v1.0.0

## Description

Tiket API Spec

## Authentication

No authentication needed to use this API

## Create Tiket

Request :
- Method : POST
- Endpoint : `/api/tiket`
- Header :
    - Content-Type: application/json
    - Accept: application/json
- Body :

```json 
{
   "id" : "string,unique"
   "tanggal_masuk" : "date",
   "jam_masuk" : "time",
   "status" : "enum['pending','success','failed']",
   "total_bayar" : "integer",
   "kode_qr" : "text",
   "instruksi_pembayaran" : "text",
}
```

Response :

```json 
{
    "code" : "number",
    "status" : "string",
    "data" : {
        "id" : "string,unique",
        "tanggal_masuk" : "date",
        "jam_masuk" : "time",
        "status" : "enum['pending','success','failed']",
        "total_bayar" : "integer",
        "kode_qr" : "text",
        "instruksi_pembayaran" : "text",
        "created_at" : "timestamps",
        "updated_at" : "timestamps",
        "deleted_at" : "timestamps",
     }
}
```

## Get Tiket

Request :
- Method : GET
- Endpoint : `/api/tiket/{id}`
- Ticket Type Enum Description:
    - A `Pemesanan tiket masuk dan wahana`
    - B `Pemesanan hanya tiket masuk `
    - C `Pemesanan hanya wahana`
- Header :
    - Accept: application/json
Response :

```json 
{
    "code" : "number",
    "status" : "string",
    "data" : {
         "id" : "string,unique",
         "tanggal_masuk" : "date",
         "jam_masuk" : "time",
         "status" : "enum['pending','success','failed']",
         "total_bayar" : "integer",
         "kode_qr" : "text",
         "instruksi_pembayaran" : "text",
         "created_at" : "timestamps",
         "updated_at" : "timestamps",
         "deleted_at" : "timestamps",
         "tipe_tiket" : "enum[A,B,C]",
         "tiket_masuk" : {
             "id": "bigint",
             "id_tiket": "string",
             "id_user": "bigint",
             "nama_tiket_masuk": "string",
             "harga_tiket_masuk": "number",
             "tipe_tiket": "enum[normal,promo]",
             "created_at": "timestamps",
             "updated_at": "timestamps",
             "deleted_at": "timestamps"
         },
         "wahana" : [
                {
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
                {
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
                }
         ]
    }
}
```

## Update Tiket

Request :
- Method : PUT
- Endpoint : `/api/tiket/{id}`
- Header :
    - Content-Type: application/json
    - Accept: application/json
- Body :

```json 
{
    "tanggal_masuk" : "date",
    "jam_masuk" : "time",
    "status" : "enum['pending','success','failed']",
    "total_bayar" : "integer",
    "kode_qr" : "text",
    "instruksi_pembayaran" : "text"
}
```

Response :

```json 
{
    "code" : "number",
    "status" : "string",
    "data" : {
         "id" : "string,unique",
         "tanggal_masuk" : "date",
         "jam_masuk" : "time",
         "status" : "enum['pending','success','failed']",
         "total_bayar" : "integer",
         "kode_qr" : "text",
         "instruksi_pembayaran" : "text",
         "created_at" : "timestamps",
         "updated_at" : "timestamps",
         "deleted_at" : "timestamps",
     }
}
```

## List Tiket

Request :
- Method : GET
- Endpoint : `/api/tiket`
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
            "id" : "string,unique",
            "tanggal_masuk" : "date",
            "jam_masuk" : "time",
            "status" : "enum['pending','success','failed']",
            "total_bayar" : "integer",
            "kode_qr" : "text",
            "instruksi_pembayaran" : "text",
            "created_at" : "timestamps",
            "updated_at" : "timestamps",
            "deleted_at" : "timestamps",
        },
        {
             "id" : "string,unique",
             "tanggal_masuk" : "date",
             "jam_masuk" : "time",
             "status" : "enum['pending','success','failed']",
             "total_bayar" : "integer",
             "kode_qr" : "text",
             "instruksi_pembayaran" : "text",
             "created_at" : "timestamps",
             "updated_at" : "timestamps",
             "deleted_at" : "timestamps",
         }
    ]
}
```

## Delete Tiket

Request :
- Method : DELETE
- Endpoint : `/api/tiket/id`
- Header :
    - Accept: application/json

Response :

```json 
{
    "code" : "number",
    "status" : "string"
}
```
~~~~
