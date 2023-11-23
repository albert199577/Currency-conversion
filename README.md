# Currency conversion 

## How to use Currency conversion?
1. **Clone this repository.**
```bash
git clone https://github.com/albert199577/Currency-conversion-.git
```
> Please make sure that your PHP version is >= 7.4 and that Composer is installed.

2. **Install Project Dependencies**
```bash
composer install
```
3. **Copy the `.env` File:**
```bash
cp .env.example .env
```
4. **Generate the Application Key:**
```bash
php artisan key:generate
```
5. **Run the Application:**
```bash
php artisan server
```
> After starting the Laravel development server, you can access your Laravel application by visiting localhost:8000 in your browser.
# Currency Conversion API

## Endpoint

- **Endpoint:** `/api/currency-conversion`

## Method

- **Method:** `GET`

## Query Parameters

| Parameter | Type     | Description                                         |
|-----------|----------|-----------------------------------------------------|
| `source`  | String   | Source currency code (e.g., 'TWD', 'JPY', 'USD').   |
| `target`  | String   | Target currency code for conversion. (e.g., 'TWD', 'JPY', 'USD').                   |
| `amount`  | String   | Amount to be converted (e.g., '$100', '$1,000'). Must follow the regex pattern: `/^\$[1-9]\d{0,2}(,\d{3})*$/`. |

## Example Request

This API is designed for using a GET request to obtain currency conversion.

`GET /api/currency-conversion?source=USD&target=JPY&amount=$1,525`

## Example Response

```json
{
  "msg": "success"
  "amount": "$170496.53"
}
```

## Error Response

- **400 Bad Request:** Invalid input parameters.
