<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($pets as $pet)
    @php 
    $petbreed = DB::table('breeds')->where('id', $pet->breed_id)->first();
    @endphp
        <url>
            <loc>{{url('/cats-and-kittens-for-sale/'.$petbreed->slug.'/'.$pet->slug)}}</loc>
            <lastmod>{{ gmdate('Y-m-d\TH:i:s\Z',strtotime($pet->updated_at)) }}</lastmod>
            <changefreq>daily</changefreq>
            <priority>0.6</priority>
        </url>
    @endforeach
</urlset>