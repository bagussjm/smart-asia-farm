# E-Ticket Asia Farm API Spec v1.0.0

## Description

Landmark API Spec

## Authentication

No authentication needed to use this API

## Create Landmark

Request :
- Method : POST
- Endpoint : `/api/landmark`
- Header :
    - Content-Type: application/json
    - Accept: application/json
- Body :

```json 
{
    "nama_landmark" : "string",
    "info_landmark" : "string",
    "deskripsi_landmark" : "text",
    "profil_landmark" : "text",
    "gambar_landmark" : "array",
}
```

Response :

```json 
{
    "code" : "number",
    "status" : "string",
    "data" : {
        "id" : "bigint,unique",
        "nama_landmark" : "string",
        "info_landmark" : "string",
        "deskripsi_landmark" : "text",
        "profil_landmark" : "text",
        "gambar_landmark" : [
            "text",
            "text"
        ],
        "created_at" : "timestamps",
        "updated_at" : "timestamps",
        "deleted_at" : "timestamps",
     }
}
```

## Get Landmark

Request :
- Method : GET
- Endpoint : `/api/landmark/{id}`
- Header :
    - Accept: application/json

Response :

```json 
{
    "code" : "number",
    "status" : "string",
    "data" : {
         "id" : "bigint,unique",
         "nama_landmark" : "string",
         "info_landmark" : "string",
         "deskripsi_landmark" : "text",
         "profil_landmark" : "text",
         "gambar_landmark" : [
            "text",
            "text"
        ],
        "created_at" : "timestamps",
        "updated_at" : "timestamps",
        "deleted_at" : "timestamps",
     }
}
```

## Update Landmark

Request :
- Method : PUT
- Endpoint : `/api/landmark/{id}`
- Header :
    - Content-Type: application/json
    - Accept: application/json
- Body :

```json 
{
    "nama_landmark" : "string",
    "info_landmark" : "string",
    "deskripsi_landmark" : "text",
    "profil_landmark" : "text",
    "gambar_landmark" : "array",
}
```

Response :

```json 
{
    "code" : "number",
    "status" : "string",
    "data" : {
         "id" : "bigint,unique",
         "nama_landmark" : "string",
         "info_landmark" : "string",
         "deskripsi_landmark" : "text",
         "profil_landmark" : "text",
         "gambar_landmark" : [
            "text",
            "text"
         ],
        "created_at" : "timestamps",
        "updated_at" : "timestamps",
        "deleted_at" : "timestamps",
     }
}
```

## List Landmark

Request :
- Method : GET
- Endpoint : `/api/landmarks`
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
            "nama_landmark" : "string",
            "info_landmark" : "string",
            "deskripsi_landmark" : "text",
            "profil_landmark" : "text",
            "gambar_landmark" : [
                "text",
                "text"
            ],
            "created_at" : "timestamps",
            "updated_at" : "timestamps",
            "deleted_at" : "timestamps",
        },
        {
             "id" : "bigint,unique",
             "nama_landmark" : "string",
             "info_landmark" : "string",
             "deskripsi_landmark" : "text",
             "profil_landmark" : "text",
             "gambar_landmark" : [
                "text",
                "text"
             ],
            "created_at" : "timestamps"
            "updated_at" : "timestamps"
            "deleted_at" : "timestamps"
        }
    ]
}
```

## Delete Landmark

Request :
- Method : DELETE
- Endpoint : `/api/landmark/id`
- Header :
    - Accept: application/json

Response :

```json 
{
    "code" : "number",
    "status" : "string"
}
```
