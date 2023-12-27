<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Advert
 *
 * @property int $id
 * @property string $name
 * @property string $position
 * @property string $type
 * @property string|null $url
 * @property string|null $iframe
 * @property \Illuminate\Support\Carbon|null $expired_at
 * @property bool $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, \Spatie\MediaLibrary\MediaCollections\Models\Media> $media
 * @property-read int|null $media_count
 * @method static \Illuminate\Database\Eloquent\Builder|Advert active()
 * @method static \Illuminate\Database\Eloquent\Builder|Advert newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Advert newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Advert query()
 * @method static \Illuminate\Database\Eloquent\Builder|Advert whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advert whereExpiredAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advert whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advert whereIframe($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advert whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advert whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advert wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advert whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advert whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advert whereUrl($value)
 */
	class Advert extends \Eloquent implements \Spatie\MediaLibrary\HasMedia {}
}

namespace App\Models{
/**
 * App\Models\Blog
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property int $category_id
 * @property string|null $description
 * @property string $short_content
 * @property string $content
 * @property int $views
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Category $category
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, Media> $media
 * @property-read int|null $media_count
 * @property-write mixed $tags
 * @method static \Illuminate\Database\Eloquent\Builder|Blog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Blog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Blog query()
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereShortContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereViews($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog withAllTags(\ArrayAccess|\Spatie\Tags\Tag|array|string $tags, ?string $type = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog withAllTagsOfAnyType($tags)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog withAnyTags(\ArrayAccess|\Spatie\Tags\Tag|array|string $tags, ?string $type = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog withAnyTagsOfAnyType($tags)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog withoutTags(\ArrayAccess|\Spatie\Tags\Tag|array|string $tags, ?string $type = null)
 * @mixin \Eloquent
 * @property-read \Kalnoy\Nestedset\Collection<int, \Artisanry\Commentable\Models\Comment> $comments
 * @property-read int|null $comments_count
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereTags($value)
 */
	class Blog extends \Eloquent implements \Spatie\MediaLibrary\HasMedia {}
}

namespace App\Models{
/**
 * App\Models\Breed
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string|null $description
 * @property int $is_popular
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $seo_title
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Pet> $listings
 * @property-read int|null $listings_count
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, \Spatie\MediaLibrary\MediaCollections\Models\Media> $media
 * @property-read int|null $media_count
 * @method static \Illuminate\Database\Eloquent\Builder|Breed newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Breed newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Breed popular()
 * @method static \Illuminate\Database\Eloquent\Builder|Breed query()
 * @method static \Illuminate\Database\Eloquent\Builder|Breed whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Breed whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Breed whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Breed whereIsPopular($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Breed whereSeoTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Breed whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Breed whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Breed whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Breed whereUpdatedAt($value)
 */
	class Breed extends \Eloquent implements \Spatie\MediaLibrary\HasMedia {}
}

namespace App\Models{
/**
 * App\Models\Calendar
 *
 * @property int $id
 * @property int $user_id
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $start
 * @property \Illuminate\Support\Carbon|null $end
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Calendar newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Calendar newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Calendar query()
 * @method static \Illuminate\Database\Eloquent\Builder|Calendar whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Calendar whereEnd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Calendar whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Calendar whereStart($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Calendar whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Calendar whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Calendar whereUserId($value)
 */
	class Calendar extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Category
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string|null $description
 * @property int $is_popular
 * @property string $essence
 * @property string $status
 * @property int $_lft
 * @property int $_rgt
 * @property int|null $parent_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Blog> $blogs
 * @property-read int|null $blogs_count
 * @property-read \Kalnoy\Nestedset\Collection<int, Category> $children
 * @property-read int|null $children_count
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, \Spatie\MediaLibrary\MediaCollections\Models\Media> $media
 * @property-read int|null $media_count
 * @property-read Category|null $parent
 * @method static \Kalnoy\Nestedset\Collection<int, static> all($columns = ['*'])
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category ancestorsAndSelf($id, array $columns = [])
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category ancestorsOf($id, array $columns = [])
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category applyNestedSetScope(?string $table = null)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category countErrors()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category d()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category defaultOrder(string $dir = 'asc')
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category descendantsAndSelf($id, array $columns = [])
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category descendantsOf($id, array $columns = [], $andSelf = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category fixSubtree($root)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category fixTree($root = null)
 * @method static \Kalnoy\Nestedset\Collection<int, static> get($columns = ['*'])
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category getNodeData($id, $required = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category getPlainNodeData($id, $required = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category getTotalErrors()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category hasChildren()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category hasParent()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category isBroken()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category leaves(array $columns = [])
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category makeGap(int $cut, int $height)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category moveNode($key, $position)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category newModelQuery()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category newQuery()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category orWhereAncestorOf(bool $id, bool $andSelf = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category orWhereDescendantOf($id)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category orWhereNodeBetween($values)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category orWhereNotDescendantOf($id)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category ordered(string $direction = 'asc')
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category query()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category rebuildSubtree($root, array $data, $delete = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category rebuildTree(array $data, $delete = false, $root = null)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category reversed()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category root(array $columns = [])
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category whereAncestorOf($id, $andSelf = false, $boolean = 'and')
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category whereAncestorOrSelf($id)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category whereCreatedAt($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category whereDescendantOf($id, $boolean = 'and', $not = false, $andSelf = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category whereDescendantOrSelf(string $id, string $boolean = 'and', string $not = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category whereDescription($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category whereEssence($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category whereId($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category whereIsAfter($id, $boolean = 'and')
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category whereIsBefore($id, $boolean = 'and')
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category whereIsLeaf()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category whereIsPopular($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category whereIsRoot()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category whereLft($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category whereNodeBetween($values, $boolean = 'and', $not = false, $query = null)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category whereNotDescendantOf($id)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category whereParentId($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category whereRgt($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category whereSlug($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category whereStatus($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category whereTitle($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category whereUpdatedAt($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category withDepth(string $as = 'depth')
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category withoutRoot()
 */
	class Category extends \Eloquent implements \Spatie\MediaLibrary\HasMedia {}
}

namespace App\Models{
/**
 * App\Models\Certification
 *
 * @property int $id
 * @property int $pet_id
 * @property int $tica
 * @property int $acfa
 * @property int $ccc_nsw
 * @property int $cfa
 * @property int $gccf
 * @property int $wcf
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Pet $pet
 * @method static \Illuminate\Database\Eloquent\Builder|Certification newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Certification newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Certification query()
 * @method static \Illuminate\Database\Eloquent\Builder|Certification whereAcfa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Certification whereCccNsw($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Certification whereCfa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Certification whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Certification whereGccf($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Certification whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Certification wherePetId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Certification whereTica($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Certification whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Certification whereWcf($value)
 */
	class Certification extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ContactForm
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $subject
 * @property string $message
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ContactForm newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ContactForm newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ContactForm query()
 * @method static \Illuminate\Database\Eloquent\Builder|ContactForm whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactForm whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactForm whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactForm whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactForm whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactForm whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactForm whereSubject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactForm whereUpdatedAt($value)
 */
	class ContactForm extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Country
 *
 * @property int $id
 * @property string $name
 * @property string $code
 * @property string $region
 * @property string $subregion
 * @property string $lat
 * @property string $lng
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|Country newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Country newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Country query()
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereLat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereLng($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereRegion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereSubregion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereUpdatedAt($value)
 */
	class Country extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Document
 *
 * @property int $id
 * @property int $user_id
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, \Spatie\MediaLibrary\MediaCollections\Models\Media> $media
 * @property-read int|null $media_count
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Document newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Document newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Document query()
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereUserId($value)
 */
	class Document extends \Eloquent implements \Spatie\MediaLibrary\HasMedia {}
}

namespace App\Models{
/**
 * App\Models\Family
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property int $breed_id
 * @property int $user_id
 * @property string $gender
 * @property string|null $age
 * @property string|null $color
 * @property string|null $size
 * @property string|null $sire
 * @property string|null $dam
 * @property string|null $awards
 * @property string $type
 * @property string $who
 * @property string|null $health
 * @property string|null $achievements_certificates
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Breed $breed
 * @property-read \App\Models\User $breeder
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Pet> $childrens
 * @property-read int|null $childrens_count
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, \Spatie\MediaLibrary\MediaCollections\Models\Media> $media
 * @property-read int|null $media_count
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Family newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Family newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Family query()
 * @method static \Illuminate\Database\Eloquent\Builder|Family whereAchievementsCertificates($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Family whereAge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Family whereAwards($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Family whereBreedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Family whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Family whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Family whereDam($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Family whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Family whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Family whereHealth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Family whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Family whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Family whereSire($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Family whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Family whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Family whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Family whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Family whereWho($value)
 */
	class Family extends \Eloquent implements \Spatie\MediaLibrary\HasMedia {}
}

namespace App\Models{
/**
 * App\Models\FamilyPet
 *
 * @property int $id
 * @property int $pet_id
 * @property int $family_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Family $family
 * @method static \Illuminate\Database\Eloquent\Builder|FamilyPet newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FamilyPet newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FamilyPet query()
 * @method static \Illuminate\Database\Eloquent\Builder|FamilyPet whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FamilyPet whereFamilyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FamilyPet whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FamilyPet wherePetId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FamilyPet whereUpdatedAt($value)
 */
	class FamilyPet extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Faq
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $text
 * @property int $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Faq newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Faq newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Faq query()
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereUserId($value)
 */
	class Faq extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Favorite
 *
 * @property int $id
 * @property int $user_id
 * @property int $pet_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Pet $pet
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Favorite newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Favorite newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Favorite query()
 * @method static \Illuminate\Database\Eloquent\Builder|Favorite whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Favorite whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Favorite wherePetId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Favorite whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Favorite whereUserId($value)
 */
	class Favorite extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Feature
 *
 * @property int $id
 * @property int $plan_id
 * @property string $title
 * @property string $name
 * @property int $days_long
 * @property int $limit
 * @property int $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Plan $plan
 * @method static \Illuminate\Database\Eloquent\Builder|Feature newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Feature newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Feature query()
 * @method static \Illuminate\Database\Eloquent\Builder|Feature whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Feature whereDaysLong($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Feature whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Feature whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Feature whereLimit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Feature whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Feature wherePlanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Feature whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Feature whereUpdatedAt($value)
 */
	class Feature extends \Eloquent {}
}

namespace App\Models\Forum{
/**
 * App\Models\Forum\Posts
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Posts newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Posts newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Posts query()
 */
	class Posts extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Page
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string $route
 * @property string $type
 * @property string|null $content
 * @property int $views
 * @property int $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, \Spatie\MediaLibrary\MediaCollections\Models\Media> $media
 * @property-read int|null $media_count
 * @property-read \RalphJSmit\Laravel\SEO\Models\SEO $seo
 * @method static \Illuminate\Database\Eloquent\Builder|Page newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Page newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Page query()
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereRoute($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereViews($value)
 */
	class Page extends \Eloquent implements \Spatie\MediaLibrary\HasMedia {}
}

namespace App\Models{
/**
 * App\Models\Pet
 *
 * @property int $id
 * @property int $user_id
 * @property string $title
 * @property string $slug
 * @property string|null $description
 * @property string|null $full_description
 * @property int $breed_id
 * @property string|null $age
 * @property string|null $gender
 * @property string|null $keywords
 * @property string|null $pt
 * @property string|null $price
 * @property string|null $price_breeding
 * @property int $cb
 * @property int $pedigree
 * @property int $ns
 * @property string|null $ready
 * @property string|null $birthday
 * @property string|null $color
 * @property \Illuminate\Support\Carbon|null $expired_at
 * @property int $renew
 * @property int $views
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Breed $breed
 * @property-read \App\Models\Certification|null $certifications
 * @property-read mixed $photo
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, \Spatie\MediaLibrary\MediaCollections\Models\Media> $media
 * @property-read int|null $media_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\FamilyPet> $parents
 * @property-read int|null $parents_count
 * @property-read \RalphJSmit\Laravel\SEO\Models\SEO $seo
 * @property-read \App\Models\Shipping|null $shipping
 * @property-read \App\Models\User $user
 * @property-read \App\Models\Vactination|null $vactinations
 * @method static \Illuminate\Database\Eloquent\Builder|Pet active()
 * @method static \Database\Factories\PetFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Pet newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pet newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pet notActive()
 * @method static \Illuminate\Database\Eloquent\Builder|Pet query()
 * @method static \Illuminate\Database\Eloquent\Builder|Pet whereAge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pet whereBirthday($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pet whereBreedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pet whereCb($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pet whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pet whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pet whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pet whereExpiredAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pet whereFullDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pet whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pet whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pet whereKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pet whereNs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pet wherePedigree($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pet wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pet wherePriceBreeding($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pet wherePt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pet whereReady($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pet whereRenew($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pet whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pet whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pet whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pet whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pet whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pet whereViews($value)
 */
	class Pet extends \Eloquent implements \Spatie\MediaLibrary\HasMedia {}
}

namespace App\Models{
/**
 * App\Models\Plan
 *
 * @property int $id
 * @property string $title
 * @property string $name
 * @property string|null $description
 * @property string|null $price_stripe
 * @property string $price
 * @property string $period
 * @property int $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Feature|null $feature
 * @method static \Illuminate\Database\Eloquent\Builder|Plan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Plan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Plan query()
 * @method static \Illuminate\Database\Eloquent\Builder|Plan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plan whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plan whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plan whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plan wherePeriod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plan wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plan wherePriceStripe($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plan whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plan whereUpdatedAt($value)
 */
	class Plan extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Seo
 *
 * @property int $id
 * @property string $heading
 * @property string $title
 * @property string|null $name
 * @property string|null $description
 * @property string|null $keywords
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Seo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Seo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Seo query()
 * @method static \Illuminate\Database\Eloquent\Builder|Seo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Seo whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Seo whereHeading($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Seo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Seo whereKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Seo whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Seo whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Seo whereUpdatedAt($value)
 */
	class Seo extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Setting
 *
 * @property int $id
 * @property string|null $site_name
 * @property string $timezone
 * @property string $currency
 * @property array|null $analytics
 * @property string|null $footer_text
 * @property string|null $copyright
 * @property string $phone
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting query()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereAnalytics($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereCopyright($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereFooterText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereSiteName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereTimezone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereUpdatedAt($value)
 */
	class Setting extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Shipping
 *
 * @property int $id
 * @property int $pet_id
 * @property int $shipping_fee
 * @property string $shipping_price
 * @property int $shipping_destination
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Pet $pet
 * @method static \Illuminate\Database\Eloquent\Builder|Shipping newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Shipping newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Shipping query()
 * @method static \Illuminate\Database\Eloquent\Builder|Shipping whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shipping whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shipping wherePetId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shipping whereShippingDestination($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shipping whereShippingFee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shipping whereShippingPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shipping whereUpdatedAt($value)
 */
	class Shipping extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string|null $name
 * @property string $username
 * @property string $first_name
 * @property string $last_name
 * @property int|null $country_id
 * @property int $plan_id
 * @property string|null $program_name
 * @property string|null $phone_number
 * @property string|null $address
 * @property string|null $about_me
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property mixed $password
 * @property string $type
 * @property string $status
 * @property string|null $lat
 * @property string|null $lng
 * @property int $views
 * @property int $is_verify
 * @property bool $is_admin
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $stripe_id
 * @property string|null $pm_type
 * @property string|null $pm_last_four
 * @property string|null $trial_ends_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Calendar> $calendar
 * @property-read int|null $calendar_count
 * @property-read \App\Models\Country|null $country
 * @property-read \App\Models\Document|null $document
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Family> $family
 * @property-read int|null $family_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Faq> $faqs
 * @property-read int|null $faqs_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Favorite> $favorites
 * @property-read int|null $favorites_count
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, \Spatie\MediaLibrary\MediaCollections\Models\Media> $media
 * @property-read int|null $media_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Musonza\Chat\Models\Participation> $participation
 * @property-read int|null $participation_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Pet> $pets
 * @property-read int|null $pets_count
 * @property-read \App\Models\Plan $plan
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Digikraaft\ReviewRating\Models\Review> $reviews
 * @property-read int|null $reviews_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Cashier\Subscription> $subscriptions
 * @property-read int|null $subscriptions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Viewed> $vieweds
 * @property-read int|null $vieweds_count
 * @method static \Illuminate\Database\Eloquent\Builder|User allReviews()
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User hasExpiredGenericTrial()
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User onGenericTrial()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAboutMe($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsAdmin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsVerify($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLng($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePlanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePmLastFour($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePmType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereProgramName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereStripeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTrialEndsAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUsername($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereViews($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User withRatings()
 */
	class User extends \Eloquent implements \Spatie\MediaLibrary\HasMedia {}
}

namespace App\Models{
/**
 * App\Models\Vactination
 *
 * @property int $id
 * @property int $pet_id
 * @property bool $fnv
 * @property bool $fcv
 * @property bool $fpv
 * @property bool $rabies
 * @property bool $felv
 * @property bool $chlamydia
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Pet $pet
 * @method static \Illuminate\Database\Eloquent\Builder|Vactination newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Vactination newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Vactination query()
 * @method static \Illuminate\Database\Eloquent\Builder|Vactination whereChlamydia($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vactination whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vactination whereFcv($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vactination whereFelv($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vactination whereFnv($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vactination whereFpv($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vactination whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vactination wherePetId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vactination whereRabies($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vactination whereUpdatedAt($value)
 */
	class Vactination extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Video
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string $type
 * @property string|null $video
 * @property string $position
 * @property int $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, \Spatie\MediaLibrary\MediaCollections\Models\Media> $media
 * @property-read int|null $media_count
 * @method static \Illuminate\Database\Eloquent\Builder|Video newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Video newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Video query()
 * @method static \Illuminate\Database\Eloquent\Builder|Video whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Video whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Video whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Video whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Video wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Video whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Video whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Video whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Video whereVideo($value)
 */
	class Video extends \Eloquent implements \Spatie\MediaLibrary\HasMedia {}
}

namespace App\Models{
/**
 * App\Models\Viewed
 *
 * @property int $id
 * @property int $user_id
 * @property int $pet_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Pet $pet
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Viewed newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Viewed newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Viewed query()
 * @method static \Illuminate\Database\Eloquent\Builder|Viewed whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Viewed whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Viewed wherePetId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Viewed whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Viewed whereUserId($value)
 */
	class Viewed extends \Eloquent {}
}

