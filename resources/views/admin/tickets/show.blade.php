<div class="card">
    <div class="card-body">
        <h3>{{ $ticket->subject }}</h3>
        <p><strong>От:</strong> {{ $ticket->customer->name }} ({{ $ticket->customer->phone }})</p>
        <hr>
        <p>{{ $ticket->message }}</p>

        @if($media->count() > 0)
            <h5>Вложения:</h5>
            <ul>
                @foreach($media as $file)
                    <li>
                        <a href="{{ $file->getUrl() }}" target="_blank">{{ $file->file_name }}</a>
                        ({{ round($file->size / 1024) }} KB)
                    </li>
                @endforeach
            </ul>
        @endif

        <form action="{{ route('admin.tickets.status', $ticket) }}" method="POST" class="mt-4">
            @csrf @method('PATCH')
            <label>Сменить статус:</label>
            <select name="status" onchange="this.form.submit()" class="form-select w-25">
                @foreach(['new', 'in_progress', 'resolved'] as $status)
                    <option value="{{ $status }}" {{ $ticket->status == $status ? 'selected' : '' }}>{{ $status }}</option>
                @endforeach
            </select>
        </form>
    </div>
</div>
