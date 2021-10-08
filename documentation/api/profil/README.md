# E-Ticket Asia Farm API Spec v1.0.0

## Description

Asia Farm Profil API Spec

## Authentication

No authentication needed to use this API


## Get Profil

Request :
- Method : GET
- Endpoint : `/api/profil/{id}`
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
