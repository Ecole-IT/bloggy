# Bloggy

A very simple & light api written in PHP to manage post.

## Usage

```
docker-compose up -d
```

## Entities

You could retrieve the database diagram here: https://dbdiagram.io/d/637a04f4c9abfc611173ef29

## Routes

All response are in JSON.

### `GET /users`

Return list of users

### `GET /posts`

Return list of posts.

### `GET /posts/{ID}`

Retrieve a post, 

Possible response code:

- 200: OK
- 404: The post doesn't exist.

### `DELETE /posts/{ID}`

Delete a post,

Possible response code:

- 200: OK
- 404: The post doesn't exist.


### `PUT /posts/{ID}`

Replace a post.

Required field:

- title
- resume
- content
- author_id
- image_url

Possible response code:

- 200: OK
- 400: Body is malformed, see the response text for more details.
- 404: The post doesn't exist.

### `POST /posts/`

Create a post.

Required field:

- title
- resume
- content
- author_id
- image_url

Possible response code:

- 200: OK
- 400: Body is malformed, see the response text for more details.
- 404: The post doesn't exist.
