# E-Ticket Asia Farm API Spec v1.0.0

## Description

Wahana API Spec

## Authentication

No authentication needed to use this API

## Create Wahana

Request :
- Method : POST
- Endpoint : `/api/wahana`
- Header :
    - Content-Type: application/json
    - Accept: application/json
- Body :

```json 
{
    "nama_wahana" : "string",
    "deskripsi_wahana" : "text",
    "profil_wahana" : "text",
    "gambar_wahana" : "array",
    "tarif_tiket" : "integer",
    "masa_aktif" : "string",
    "syarat_ketentuan" : "text",
}
```

Response :

```json 
{
    "code" : "number",
    "status" : "string",
    "data" : {
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
}
```

## Get Wahana

Request :
- Method : GET
- Endpoint : `/api/wahana/{id}`
- Header :
    - Accept: application/json
Response :

```json 
{
    "code" : "number",
    "status" : "string",
    "data" : {
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
}
```

## Update Wahana

Request :
- Method : PUT
- Endpoint : `/api/wahana/{id}`
- Header :
    - Content-Type: application/json
    - Accept: application/json
- Body :

```json 
{
     "nama_wahana" : "string",
     "deskripsi_wahana" : "text",
     "profil_wahana" : "text",
     "gambar_wahana" : "array",
     "tarif_tiket" : "integer",
     "masa_aktif" : "string",
     "syarat_ketentuan" : "text",
}
```

Response :

```json 
{
    "code" : "number",
    "status" : "string",
    "data" : {
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
}
```

## List Wahana

Request :
- Method : GET
- Endpoint : `/api/wahana`
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
```

## Delete Wahana

Request :
- Method : DELETE
- Endpoint : `/api/wahana/id`
- Header :
    - Accept: application/json

Response :

```json 
{
    "code" : "number",
    "status" : "string"
}
```
