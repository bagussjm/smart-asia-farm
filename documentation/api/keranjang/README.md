# E-Ticket Asia Farm API Spec v1.0.0

## Description

Keranjang API Spec

## Authentication

No authentication needed to use this API

## Create Keranjang

Request :
- Method : POST
- Endpoint : `/api/keranjang`
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
         }
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
