
# Mac Vendor API SQLITE

Mac vendor query using IEEE OUI as reference

## API Reference

#### Get item

```http
  GET /mac4.php?mac={$mac}
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `mac`      | `string` | **Required**. MAC of item to fetch |

## Run Locally

Clone the project

```bash
  git clone https://github.com/phvilasboas/mac_vendor_api.git
```

Go to the project directory

```bash
  cd mac_vendor_api
```

Start the server

```bash
  docker-compose up -d
```

## Usage/Examples

```bash
curl -s http://127.0.0.1/mac4.php?mac=00:00:00:00:00:00
```


## Authors

- [@phvilasboas](https://www.github.com/phvilasboas)

## License

[MIT](https://choosealicense.com/licenses/mit/)


