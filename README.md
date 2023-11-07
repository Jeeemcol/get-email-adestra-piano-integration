# PHP Code for Adestra Integration into Piano.io using email

This PHP script is designed to integrate with the Adestra API to manage contacts and lists. It performs the following actions:

1. Decodes a base64-encoded Piano.io cookie value to extract an email address.
2. Searches for the contact with the extracted email address in an Adestra core table.
3. Retrieves the Adestra contact ID for the found contact.
4. Associates the contact with a specific Adestra list (e.g. list ID: 6043).
5. Prints the response from Adestra API after associating the contact with the list.

## Prerequisites

Before using this script, you need to have the following:

- Adestra API access: You should have access to the Adestra API and obtain an authentication code (`$_ENV["adestraauthcode"]`) to use in the script.
- You should have a Piano.io account that's setup and running on your website

## How to Use

1. Include this PHP script in your project where you need to integrate with Adestra.

2. Make sure you have the Adestra authentication code (`$_ENV["adestraauthcode"]`) properly configured in your environment variables.

3. When this script is executed, it will perform the following:

   - Decodes the base64 cookie named `__utp` to extract an email address.
   - Searches for a contact with the extracted email address in the Adestra core table.
   - Retrieves the contact's Adestra ID.
   - Associates the contact with a specific Adestra list (e.g. list ID: 6043 -- change yours accordingly).
   - Prints the response from the Adestra API.

4. If no email address is found in the decoded cookie, the script will display a message prompting users to log in or register to request a PDF.

## License

This code is provided under the MIT License. See the [LICENSE](LICENSE) file for details.

## Author

- Jeeemcol

Please make sure to handle sensitive information, such as emails and authentication codes, securely and according to best practices to protect your users' data and privacy. It is your responsibility to enforce data protection rules in accordance with the laws of each country.
