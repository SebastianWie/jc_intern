<?php
return [
    "exclude"   => ["INBOX.Drafts", "INBOX.Sent", "INBOX.Trash", "INBOX.Spam", "INBOX.Archives", "INBOX.Templates"], //TODO: make this env-configurable
    "topfolder" => env("MAILCHECKER_TOPFOLDER", "INBOX"),
    "webmail"   => env("MAILCHECKER_WEBMAIL", "https://webmail.jazzchor-bonn.de/")
];