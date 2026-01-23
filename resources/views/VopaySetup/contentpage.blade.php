<div class="main-page">
    <div class="leftbox">
        <h1>{{ $endpoint->name }}</h1>

        <div class="abdu-url-box">
          <button>{{ $endpoint->actions }}</button>
            <div class="abdu-link">{{ $endpoint->url }}</div>
            <div class="abdu-copy-btn" onclick="abduCopyURL(this)">
                <i class="fas fa-copy"></i>
            </div>
        </div>

        <div class="api-descrition">{{ $endpoint->description }}</div>
        <hr>

        <div class="form">
            <h4>Form Data</h4>
            <div class="form-box-cantanir">
                @foreach ($endpoint->params as $param)
                    <div class="input-box">
                        <div class="form-row">
                            <div class="left-info">
                                <div class="info_data">
                                    <label class="inputlable" style="font-weight: 500">{{ $param->name }}</label>
                                    <label class="typelable">{{ $param->type }}</label>
                                    <label class="requiredlable">{{ $param->required ? 'required' : 'optional' }}</label>
                                </div>
                                <div class="hed_line">{{ $param->description }}</div>
                            </div>
                            <div class="input_box_api">
                                <input type="{{ $endpoint->actions }}" name="{{ $param->name }}">
                            </div>
                        </div>
                    </div>
                    <hr>
                @endforeach
            </div>
        </div>

      

        <div class="update-line">
            <h5>
                <i class="fas fa-clock" style="margin-right:6px; color:#637288;"></i>
                Updated {{ $endpoint->updated_at->diffForHumans() }}
            </h5>
        </div>
    </div>

    <div class="right-box">
        <div class="right_page">
            <h3>Request type</h3>
            <p>{{ $endpoint->request_sample }}</p>
        </div>
        <div class="right_page">
            <h3>Response type</h3>
            <p>{{ $endpoint->response_sample }}</p>
        </div>
    </div>
</div>
@endsection