<p align="center"><img src="https://cost.digitalcommunity.id/images/cost_65.png"></p>

## Overview

The purpose of this documentation is to provide a specification for INTRANS Web Service API (Application Programming Interface). Data in this API contains all projects and the details included parties, budget, period, contracts, etc. that have been published by the Transportation Office West Lombok District.

There will be only one web service URL with GET method for client to call, and the return response will be in JSON format by default. 

## Getting Started

The current version of the API lives at [Live API](https://cost.digitalcommunity.id/oc4ids).

### Version

| Version | Date | Changes |
| ------- | ---- | ------- |
| Version 1 | 2021-04-25 | Initial deployment |
| Version 2 | 2021-05-03 | Change data structure to fit user requirement |

### Endpoints

| Endpoint | What it does |
| -------- | ------------ |
| /oc4ids | Returns an objects of projects that have been published |

## API Calls

This API supports a data response in JSON format.

`GET : /oc4ids`

### Implementation Notes

This endpoint returns published projects.

### Response Content Type

Application/json

### Parameters

No parameters needed

### Response Class (Status 200)

An object of projects, example value:

```javascript
{
    "version": "0.9",
    "uri": "string",
    "publishedDate": datetime,
    "publisher": {
        "name": "string"
    },
    "projects": [
        {
            "id": “string”,
            "externalReference": "string",
            "updated": datetime,
            "title": "string",
            "description": "string",
            "status": "string",
            "period": {
                "startDate": datetime,
                "endDate": datetime,
                "durationInDays": integer
            },
            "sector": [
                "string",
                "string"
            ],
            "purpose": "string",
            "type": "string",
            "locations": [
                {
                    "id": "string",
                    "description": "string",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            integer,
                            integer
                        ]
                    }
                },
            ],
            "budget": {
                "amount": {
                    "amount": double,
                    "currency": "string"
                },
                "approvalDate": datetime
            },
            "parties": [
                {
                    "name": "string",
                    "id": “string”,
                    "contactPoint": {
                        "name": "string"
                    },
                    "roles": [
                        "string",
                        "string"
                    ]
                },
            ],
            "publicAuthority": {
                "id": "string",
                "name": "string"
            },
            "contractingProcesses": [
                {
                    "id": "string",
                    "summary": {
                        "title": "string",
                        "description": "string",
                        "tender": {
                            "procurementMethod": "string",
                            "procurementMethodDetails": "string",
                            "numberOfTenderers": integer,
                            "administrativeEntity": {
                                "id": "string",
                                "name": "string"
                            }
                        },
                        "nature": [
                            "string"
                        ],
                        "contractValue": {
                            "amount": double,
                            "currency": "string"
                        },
                        "suppliers": [
                            {
                                "id": "string",
                                "name": "string"
                            }
                        ]
                    }
                }
            ],
            "documents": [
                {
                    "id": "string",
                    "description": "String",
                    "type": "string"
                },
            ]
        },
    ],
}
```

### Response Messages

| HTTP Status Code | Reason | Response (Example Value) |
| ---------------- | ------ | ------------------------ |
| 500 | Server error | `{ "message": "string" }` |


## Field Reference

This field below are returned by the API.


| Field Name | Description | Data Type |
| ---------- | ----------- | --------- |
| uri | URL of the API | string | 
| publishedDate | Date and time when the API is published | datetime | 
| publisher |  | string | 
| name | Name of the application | string | 
| projects | Array of projects that have been published | string | 
| id | Unique identifier | string | 
| updated | Date and time when the project updated | datetime | 
| title | Title of the project | string | 
| description | Description of the project | string | 
| period | An object to store variable startDate (datetime), endDate (datetime), and duration (integer) | object | 
| dector | Array that store sector and subsector of the project | array | 
| type | Type of project | string | 
| locations | Array of project location that store id (string), description (string), geometry({type, coordinates}) | array | 
| budget | Budget of the project that store amount (double), currency (string), and approvalDate (datetime) | object | 
| parties | Parties that involved in the project, include variable name (string), contactPoint ({name, telephone}), address (string), roles (array). | array | 
| publicAuthority | Name of public authority for the project | array | 
| contractingProcesses | Summary of contracting process, which contain contract title, description, tender, nature, contractValue, and suppliers. | array | 
| tender | Detail of tender from the contract, that store procurementMethod (string), procurementMethodDetails (string), numberOfTenderers (integer), and administrativeEntity (object). | string | 
| documents | Files that’s describe project or required for the project, variable that included are id (string), description (string), type (string). | array | 
