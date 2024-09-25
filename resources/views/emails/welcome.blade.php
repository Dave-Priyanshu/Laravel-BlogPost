<h1 style="font-family: Arial, sans-serif; color: #333; text-align: center;">Hello {{ $user->username }}</h1>

<div style="max-width: 600px; margin: 20px auto; padding: 20px; border: 1px solid #e0e0e0; border-radius: 8px; background-color: #f9f9f9;">
    
    <h2 style="font-family: Arial, sans-serif; color: #555; margin-bottom: 10px;">Title of Your Created Post:</h2>
    <span style="color: #007BFF; font-weight: bold;">{{ $post->title }}</span>
    
    <h3 style="font-family: Arial, sans-serif; color: #555; margin: 15px 0;">Body:</h3>
    <p style="font-family: Arial, sans-serif; color: #666; line-height: 1.6;">{{ $post->body }}</p>

    <div style="text-align: center; margin-top: 20px;">
        <img src="{{ $message->embed('storage/'.$post->image) }}" alt="Post Image" style="max-width: 80%; height: auto; border-radius: 8px;">
    </div>
</div>

