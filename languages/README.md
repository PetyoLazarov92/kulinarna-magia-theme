# Kulinarna Magia Theme - Translation Guide

## Available Translations

- **Bulgarian (bg_BG)** - Complete translation available

## Using the Theme in Bulgarian

The theme will automatically use Bulgarian translation if your WordPress installation is set to Bulgarian language.

To set your WordPress language to Bulgarian:
1. Go to Settings > General
2. Select "Български" in the Site Language dropdown
3. Click "Save Changes"

## Translation Files

- `kulinarna-magia.pot` - Template file for creating new translations
- `bg_BG.po` - Bulgarian translation source file
- `bg_BG.mo` - Compiled Bulgarian translation (used by WordPress)

## Creating New Translations

To create a new translation:
1. Copy `kulinarna-magia.pot` file
2. Rename it to your language code (e.g., `de_DE.po` for German)
3. Translate all strings in the file
4. Compile the .po file to .mo using:
   ```
   msgfmt your_language.po -o your_language.mo
   ```
5. Place both files in the `/languages/` directory

## Recommended Translation Tools

- **Poedit** - https://poedit.net/ (GUI tool for Windows, Mac, Linux)
- **Loco Translate** - WordPress plugin for translating themes
- **msgfmt** - Command line tool (included in gettext package)

## Theme Text Domain

The theme text domain is: `kulinarna-magia`

All translatable strings use this text domain for proper localization.
