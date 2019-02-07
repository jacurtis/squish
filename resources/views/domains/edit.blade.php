@extends('layouts.app')

@section('content')
  <div class="sq-card">
    <div class="sq-card-header">
      <span>{{ $domain->domain }}</span>
      <button v-if="shouldSave" href="{{ route('domains.update', $domain->id) }}" class="sq-button sq-is-success">Save Changes</button>
    </div>
    <div class="sq-card-body">
      <sq-input placeholder="MyDomain.com" label="Domain" type="text" v-model="domain.domain" :validate="validationRules.domain"></sq-input>
    </div>
  </div>
@endsection

@push('scripts')
  <script>
    let app = new Vue({
      el: '#app',
      data: {
        domain: {!! $domain->toJson() !!},
        original: {!! $domain->toJson() !!},
        validationRules: {
          domain: {
            type: 'regex',
            value: /(?:[\w\-]+\.)?[\w\-]+\.[a-z]{2,}/,
            message: "Not a valid domain. Do not add http:// or https:// just 'MyDomain.com' will do"
          }
        }
      },
      computed: {
        shouldSave() {
          return !_.isEqual(this.domain, this.original)
        }
      }
    })
  </script>
@endpush