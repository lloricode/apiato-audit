<?php

/**
 * @apiGroup           Audit
 * @apiName            getAuditsByModelAndId
 *
 * @api                {GET} /v1/audits/:model/:id Get Audits By Model and ID
 * @apiDescription     Get Audits By Model Container and ID
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated User
 *
 * @apiParam           (URL Parameters) {String}  :model Supported Model Name
 * @apiParam           (URL Parameters) {String}  :id Hashed ID
 *
 * @apiSuccessExample  {json}  Success-Response:
 * HTTP/1.1 200 OK
{
    "data": [
        {
            "type": "audits",
            "id": "elqrwkjzlo9m8d5jvd5e07yvxban6pgd",
            "attributes": {
                "object": "Audit",
                "user_id": "8xxj9oy7qnwmkv5704blag6rz8p0ed6n",
                "event": "created",
                "old_values": [],
                "new_values": {
                    "id": 1,
                    "code": "CLM000001",
                    "type": "construction",
                    "status": "draft",
                    "user_id": 38
                },
                "url": "console",
                "ip_address": "127.0.0.1",
                "user_agent": "Symfony",
                "tags": null,
                "created_at": "2018-07-01 00:00:00",
                "updated_at": "2018-07-01 00:00:00",
                "readable_created_at": "4 weeks ago",
                "readable_updated_at": "4 weeks ago",
                "real_id": 58,
                "real_user_id": 1
            }
        },
        // ...
    ],
    "meta": {
        "include": [
            "user"
        ],
        "custom": [],
        "pagination": {
            "total": 2,
            "count": 2,
            "per_page": 10,
            "current_page": 1,
            "total_pages": 1
        }
    },
    "links": {
        "self": "http://<api-url>.test/v1/audits/test-model/8xxj9oy7qnwmkv5704blag6rz8p0ed6n?page=1",
        "first": "http://<api-url>.test/v1/audits/test-model/8xxj9oy7qnwmkv5704blag6rz8p0ed6n?page=1",
        "last": "http://<api-url>.test/v1/audits/test-model/8xxj9oy7qnwmkv5704blag6rz8p0ed6n?page=1"
    }
}
 */

/** @var Route $router */
$router->get('audits/{model}/{id}', [
    'as' => 'api_audit_get_audits_by_model_and_id',
    'uses'  => 'Controller@getAuditsByModelAndId',
    'middleware' => [
      'auth:api',
    ],
]);
