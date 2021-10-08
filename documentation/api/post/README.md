# E-Ticket Asia Farm API Spec v1.0.0

## Description

Post API Spec

## Authentication

No authentication needed to use this API


## Get Post

Request :
- Method : GET
- Endpoint : `/api/post/{id}`
- Default id: SMAF2021 
- Header :
    - Accept: application/json
Response :

```json 
{
    "code" : "number",
    "status" : "string",
    "data" : {
         "id" : "string,unique",
         "nama_instansi" : "string",
         "keterangan_instansi" : "text",
         "alamat_instansi" : "text",
         "lokasi_instansi" : {
            "latitude" : "decimal",
            "longitude" : "decimal"   
         },
         "foto_profil_instansi" : "text",
         "created_at" : "timestamps",
         "updated_at" : "timestamps",
         "deleted_at" : "timestamps",
     }
}
```

## List Post

Request :
- Method : GET
- Endpoint : `/api/post`
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
            "judul_post" : "string",
            "isi_post" : "text",
            "thumbnail_post" : "text",
            "created_at" : "timestamps",
            "updated_at" : "timestamps",
            "deleted_at" : "timestamps",
        },
        {
            "id" : "bigint,unique",
            "judul_post" : "string",
            "isi_post" : "text",
            "thumbnail_post" : "text",
            "created_at" : "timestamps",
            "updated_at" : "timestamps",
            "deleted_at" : "timestamps",
         }
    ]
}
```
