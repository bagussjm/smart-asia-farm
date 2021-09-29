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
