@extends('backoffice.layouts.app')

@section('content')
    <div style="padding: 15px;">
        <h1>Settings</h1>
        <form action="{{ route('system.settings.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
    
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
    
            <div class="card">
                <div class="card-header">
                    <h5>Agent Settings</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="agent_code" class="form-label">Agent Code</label>
                            <input type="text" class="form-control" id="agent_code" name="agent_code"
                                value="{{ old('agent_code', $settings->agent_code) }}">
                            @error('agent_code')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="agent_token" class="form-label">Agent Token</label>
                            <input type="text" class="form-control" id="agent_token" name="agent_token"
                                value="{{ old('agent_token', $settings->agent_token) }}">
                            @error('agent_token')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="agent_signature" class="form-label">Agent Signature</label>
                        <input type="text" class="form-control" id="agent_signature" name="agent_signature"
                            value="{{ old('agent_signature', $settings->agent_signature) }}">
                        @error('agent_signature')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
    
            <div class="card mt-3">
                <div class="card-header">
                    <h5>Website Settings</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="site_title" class="form-label">Site Title</label>
                            <input type="text" class="form-control" id="site_title" name="site_title"
                                value="{{ old('site_title', $settings->site_title) }}">
                            @error('site_title')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="site_description" class="form-label">Site Description</label>
                            <textarea class="form-control" id="site_description" name="site_description">{{ old('site_description', $settings->site_description) }}</textarea>
                            @error('site_description')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="site_logo" class="form-label">Site Logo</label>
                            <input type="file" class="form-control" id="site_logo" name="site_logo">
                            @error('site_logo')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            @if ($settings->site_logo)
                                <img src="{{ asset('storage/' . $settings->site_logo) }}" alt="Site Logo" width="100"
                                    class="mt-2">
                            @endif
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="site_favicon" class="form-label">Site Favicon</label>
                            <input type="file" class="form-control" id="site_favicon" name="site_favicon">
                            @error('site_favicon')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            @if ($settings->site_favicon)
                                <img src="{{ asset('storage/' . $settings->site_favicon) }}" alt="Site Favicon" width="50"
                                    class="mt-2">
                            @endif
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="site_maintenance" class="form-label">Site Maintenance</label>
                        <select class="form-control" id="site_maintenance" name="site_maintenance">
                            <option value="1"
                                {{ old('site_maintenance', $settings->site_maintenance) == 1 ? 'selected' : '' }}>Yes</option>
                            <option value="0"
                                {{ old('site_maintenance', $settings->site_maintenance) == 0 ? 'selected' : '' }}>No</option>
                        </select>
                        @error('site_maintenance')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
    
            <div class="card mt-3">
                <div class="card-header">
                    <h5>Contact and Social Media</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="contact_email" class="form-label">Contact Email</label>
                            <input type="email" class="form-control" id="contact_email" name="contact_email"
                                value="{{ old('contact_email', $settings->contact_email) }}">
                            @error('contact_email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="contact_phone" class="form-label">Contact Phone</label>
                            <input type="text" class="form-control" id="contact_phone" name="contact_phone"
                                value="{{ old('contact_phone', $settings->contact_phone) }}">
                            @error('contact_phone')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address"
                            value="{{ old('address', $settings->address) }}">
                        @error('address')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="social_facebook" class="form-label">Facebook URL</label>
                            <input type="url" class="form-control" id="social_facebook" name="social_facebook"
                                value="{{ old('social_facebook', $settings->social_facebook) }}">
                            @error('social_facebook')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="social_twitter" class="form-label">Twitter URL</label>
                            <input type="url" class="form-control" id="social_twitter" name="social_twitter"
                                value="{{ old('social_twitter', $settings->social_twitter) }}">
                            @error('social_twitter')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="social_instagram" class="form-label">Instagram URL</label>
                            <input type="url" class="form-control" id="social_instagram" name="social_instagram"
                                value="{{ old('social_instagram', $settings->social_instagram) }}">
                            @error('social_instagram')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="social_linkedin" class="form-label">LinkedIn URL</label>
                            <input type="url" class="form-control" id="social_linkedin" name="social_linkedin"
                                value="{{ old('social_linkedin', $settings->social_linkedin) }}">
                            @error('social_linkedin')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="social_telegram" class="form-label">Telegram URL</label>
                        <input type="url" class="form-control" id="social_telegram" name="social_telegram"
                            value="{{ old('social_telegram', $settings->social_telegram) }}">
                        @error('social_telegram')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
    
            <div class="card mt-3">
                <div class="card-header">
                    <h5>SEO Settings</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="meta_keywords" class="form-label">Meta Keywords</label>
                            <input type="text" class="form-control" id="meta_keywords" name="meta_keywords"
                                value="{{ old('meta_keywords', $settings->meta_keywords) }}">
                            @error('meta_keywords')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="meta_author" class="form-label">Meta Author</label>
                            <input type="text" class="form-control" id="meta_author" name="meta_author"
                                value="{{ old('meta_author', $settings->meta_author) }}">
                            @error('meta_author')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="card mt-3">
                <div class="card-header">
                    <h5>Live Chat Settings</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="live_chat_link" class="form-label">Live Chat Link</label>
                        <input type="url" class="form-control" id="live_chat_link" name="live_chat_link"
                            value="{{ old('live_chat_link', $settings->live_chat_link) }}">
                        @error('live_chat_link')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="live_chat_script" class="form-label">Live Chat Script</label>
                        <textarea class="form-control" id="live_chat_script" name="live_chat_script">{{ old('live_chat_script', $settings->live_chat_script) }}</textarea>
                        @error('live_chat_script')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
    
            <button type="submit" class="btn btn-primary mt-3">Save Changes</button>
        </form>
    </div>
@endsection
