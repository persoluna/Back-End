<x-app-layout>
    <div class="py-12">
        <div class="container">
            <h1>Generate Sitemap</h1>
            <button id="generate-btn" class="btn btn-primary">Generate Sitemap</button>
                <form id="sitemap-form" method="POST" action="{{ route('admin.sitemap.publish') }}">
                    @csrf
                    <textarea id="sitemap-editor" name="xml"></textarea>
                    <button type="submit" class="btn btn-success">Publish</button>
                </form>
        </div>
    </div>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/6.65.7/codemirror.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/mode/xml/xml.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var editor = CodeMirror.fromTextArea(document.getElementById('sitemap-editor'), {
                lineNumbers: true,
                mode: 'xml',
                theme: 'default'
            });

            document.getElementById('generate-btn').addEventListener('click', function() {
                fetch('{{ route('admin.sitemap.generate') }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({})
                })
                .then(response => response.json())
                .then(data => {
                    editor.setValue(data.xml);
                });
            });

            document.getElementById('sitemap-form').addEventListener('submit', function() {
                document.getElementById('sitemap-editor').value = editor.getValue();
            });
        });
    </script>
</x-app-layout>
