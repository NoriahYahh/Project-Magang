 @extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Pengiriman</h1>

    <form action="{{ route('shipments.update', $shipment->id) }}" method="POST">
        @csrf
        @method('PUT')

        <style>
            .section-two .short-input,
            .section-two .short-select {
                max-width: 200px; /* Lebar sesuai kebutuhan */
            }

            .section-two .form-inline {
                display: flex;
                flex-wrap: wrap;
                gap: 15px;
            }

            .section-two .form-group {
                flex: 1;
            }

            /* Flexbox untuk elemen-elemen input yang bersebelahan */
            .date-inputs {
                display: flex;
                justify-content: space-between;
            }

            .date-inputs .form-group {
                flex: 1;
                margin-right: 10px; /* Jarak antar input */
            }

            .date-inputs .form-group:last-child {
                margin-right: 0; /* Menghapus margin kanan pada elemen terakhir */
            }

            .short-input,
            .short-select {
                max-width: 200px; /* Lebar sesuai kebutuhan */
            }

            /* Flexbox untuk form-group dalam satu baris */
            .inline-group {
                display: flex;
                justify-content: space-between;
            }

            .inline-group .form-group {
                flex: 1;
                margin-right: 10px; /* Jarak antar elemen */
            }

            .inline-group .form-group:last-child {
                margin-right: 0; /* Menghapus margin kanan pada elemen terakhir */
            }

            .inline-group .form-control {
                width: 100%; /* Memastikan input mengambil seluruh lebar yang tersedia */
            }

            .short-input,
            .short-select {
                max-width: 100%; /* Menghilangkan batasan lebar untuk elemen dalam inline-group */
            }
        </style>

        <div class="form-group">
            <label for="gar">GAR</label>
            <select class="form-control" id="gar" name="gar" required>
                <option value="3400" {{ old('gar', $shipment->gar) == '3400' ? 'selected' : '' }}>3400</option>
                <option value="3800" {{ old('gar', $shipment->gar) == '3800' ? 'selected' : '' }}>3800</option>
                <option value="4200" {{ old('gar', $shipment->gar) == '4200' ? 'selected' : '' }}>4200</option>
                <option value="5600" {{ old('gar', $shipment->gar) == '5600' ? 'selected' : '' }}>5600</option>
                <option value="6400" {{ old('gar', $shipment->gar) == '6400' ? 'selected' : '' }}>6400</option>
            </select>
        </div>

        <div class="form-group">
            <label for="type">Type</label>
            <select name="type" id="type" class="form-control" required>
                <option value="">Pilih Tipe</option>
                <option value="domestik" {{ old('type', $shipment->type) == 'domestik' ? 'selected' : '' }}>Domestik</option>
                <option value="international" {{ old('type', $shipment->type) == 'international' ? 'selected' : '' }}>Internasional</option>
            </select>
        </div>

        <div class="form-group">
            <label for="mv">MV</label>
            <input type="text" class="form-control" id="mv" name="mv" value="{{ old('mv', $shipment->mv) }}" {{ old('type', $shipment->type) == 'domestik' ? 'disabled' : '' }}>
        </div>

        <div class="form-group">
            <label for="bg">Barge</label>
            <input type="text" class="form-control" id="bg" name="bg" value="{{ old('bg', $shipment->bg) }}" {{ old('type', $shipment->type) == 'international' ? 'disabled' : '' }}>
        </div>

        <div class="section-two">
            <div class="form-inline">
                @foreach(['sp' => 'STOWAGE PLAN', 'fv' => 'FIGURE VESSEL', 'fd' => 'FINAL DRAFT', 'bf' => 'BARGE FIGURE', 'rc' => 'R/C BARGE', 'ss' => 'SHORTAGE/SURPLUS'] as $field => $label)
                <div class="form-group">
                    <label for="{{ $field }}">{{ $label }}</label>
                    <input type="text" name="{{ $field }}" id="{{ $field }}" class="form-control form-control-sm short-input" value="{{ old($field, $shipment->$field) }}" required>
                </div>
                @endforeach
            </div>
        </div>

        <div class="date-inputs">
            <div class="form-group">
                <label for="arrival_date">Commance</label>
                <input type="date" name="arrival_date" id="arrival_date" class="form-control" value="{{ old('arrival_date', $shipment->arrival_date) }}" required>
            </div>

            <div class="form-group">
                <label for="departure_date">Completed</label>
                <input type="date" name="departure_date" id="departure_date" class="form-control" value="{{ old('departure_date', $shipment->departure_date) }}" required>
            </div>
        </div>

        <div class="form-group">
            <label for="cargo">Cargo</label>
            <select class="form-control" id="cargo" name="cargo" required>
                <option value="Block 2" {{ old('cargo', $shipment->cargo) == 'Block 2' ? 'selected' : '' }}>Block 2</option>
                <option value="Block 3" {{ old('cargo', $shipment->cargo) == 'Block 3' ? 'selected' : '' }}>Block 3</option>
                <option value="Block 4" {{ old('cargo', $shipment->cargo) == 'Block 4' ? 'selected' : '' }}>Block 4</option>
            </select>
        </div>

        <div class="inline-group">
        <div class="form-group">
                <label for="company">BUYER</label>
                <select name="company_id" id="company" class="form-control" required>
                    <option value="">Pilih BUYER</option>
                    <!-- Populate this with existing buyers in JavaScript -->
                </select>
            </div>

            <div class="form-group">
                <label for="dt">DESTINATION</label>
                <input type="text" name="dt" id="dt" class="form-control" value="{{ old('dt', $shipment->dt) }}" required>
            </div>
        </div>

        <div class="form-group">
            <label for="tg">B/L</label>
            <input type="text" name="tg" id="tg" class="form-control" value="{{ old('tg', $shipment->tg) }}" required readonly>
        </div>

        <div class="form-group">
            <label for="sv">SURVEYOR</label>
            <select class="form-control" id="sv" name="sv" required>
                <option value="">Pilih SURVEYOR</option>
                @foreach($surveyors as $surveyor)
                    <option value="{{ $surveyor->name }}" {{ old('sv', $shipment->sv) == $surveyor->name ? 'selected' : '' }}>
                        {{ $surveyor->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div style="margin-top: 10px;">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        var type = $('#type').val();
        var companySelect = $('#company');
        var mvInput = $('#mv');
        var bargeInput = $('#bg');
        var departureDateInput = $('#departure_date');
        var tgInput = $('#tg');

        function toggleFields() {
            if (type === 'domestik') {
                mvInput.prop('disabled', true);
                bargeInput.prop('disabled', false);
            } else {
                mvInput.prop('disabled', false);
                bargeInput.prop('disabled', true);
            }
        }

        function updateBLValue() {
            var date = departureDateInput.val();
            if (date) {
                var formattedDate = new Date(date);
                var year = formattedDate.getFullYear();
                var month = String(formattedDate.getMonth() + 1).padStart(2, '0'); // Months are zero-based
                var day = String(formattedDate.getDate()).padStart(2, '0');
                tgInput.val(year + "-" + month + "-" + day);
            } else {
                tgInput.val('');
            }
        }

        // Populate company options based on the current type
        if (type) {
            $.ajax({
                url: "{{ route('shipments.getCompanies') }}",
                type: 'GET',
                data: { type: type },
                dataType: 'json',
                success: function(companies) {
                    if (companies.error) {
                        console.error(companies.error);
                    } else {
                        $.each(companies, function(id, name) {
                            companySelect.append('<option value="' + id + '"' + (id == '{{ $shipment->company_id }}' ? ' selected' : '') + '>' + name + '</option>');
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Request failed with status: ' + xhr.status + ', Error: ' + error);
                }
            });
        }

        // Update company options and toggle fields when type changes
        $('#type').change(function() {
            type = $(this).val();
            companySelect.empty();
            companySelect.append('<option value="">Pilih BUYER</option>');
            toggleFields();

            if (type) {
                $.ajax({
                    url: "{{ route('shipments.getCompanies') }}",
                    type: 'GET',
                    data: { type: type },
                    dataType: 'json',
                    success: function(companies) {
                        if (companies.error) {
                            console.error(companies.error);
                        } else {
                            $.each(companies, function(id, name) {
                                companySelect.append('<option value="' + id + '">' + name + '</option>');
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Request failed with status: ' + xhr.status + ', Error: ' + error);
                    }
                });
            }
        });

        // Update B/L value when departure date changes
        departureDateInput.change(updateBLValue);

        // Initial field toggle and BL value update based on the loaded data
        toggleFields();
        updateBLValue();
    });
</script>
@endsection


