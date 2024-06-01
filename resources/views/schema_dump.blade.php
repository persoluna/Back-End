<div>
    <button id="schemaDumpButton">Download Schema Dump</button>

    <script>
        document.getElementById('schemaDumpButton').addEventListener('click', function() {
            window.location.href = "{{ route('schema.dump') }}";
        });
    </script>
</div>
