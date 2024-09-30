# QuillJs bundle by CWS

## Configuration

```
composer require creative-web-solution/cws-quilljs-bundle
```

**Add this line on bundles.php:**

```
Cws\Bundle\QuillJsBundle\CwsQuillJsBundle::class => ['all' => true],
```

Create `cws_quill_js.yaml` into config/packages:
```
cws_quill_js:
    enabled: true
    toolbar:
        - ['bold', 'italic', 'underline', 'strike']
        - [{'list': 'ordered'}, {'list': 'bullet'}]
        - ['link']
        - ['clean']
```

It's done.
