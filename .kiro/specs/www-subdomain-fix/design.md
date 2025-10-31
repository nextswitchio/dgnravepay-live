# Design Document

## Overview

The www subdomain issue is caused by improper asset URL generation and missing domain configuration in the Laravel application. The solution involves updating application configuration, implementing proper domain handling, and ensuring consistent asset loading across both www and non-www versions of the domain.

## Architecture

The fix will be implemented at multiple layers:

1. **Application Configuration Layer**: Update Laravel configuration files to handle production domain
2. **Asset Management Layer**: Ensure Vite assets are generated with proper URLs
3. **Web Server Layer**: Configure .htaccess rules for domain handling
4. **Middleware Layer**: Implement domain normalization if needed

## Components and Interfaces

### 1. Environment Configuration
- **Component**: `.env` file updates
- **Purpose**: Set proper APP_URL and ASSET_URL for production
- **Interface**: Environment variables that Laravel reads during bootstrap

### 2. Application Configuration
- **Component**: `config/app.php` modifications
- **Purpose**: Handle dynamic URL generation based on request domain
- **Interface**: Laravel configuration system

### 3. Asset URL Generation
- **Component**: Asset URL helper modifications
- **Purpose**: Ensure assets load correctly regardless of www/non-www access
- **Interface**: Laravel's asset() helper and Vite integration

### 4. Domain Normalization Middleware
- **Component**: Custom middleware for domain consistency
- **Purpose**: Redirect users to preferred domain format (optional)
- **Interface**: Laravel middleware pipeline

### 5. Web Server Configuration
- **Component**: `.htaccess` updates
- **Purpose**: Handle domain redirects at server level
- **Interface**: Apache mod_rewrite rules

## Data Models

No database changes required. This is purely a configuration and asset handling issue.

## Error Handling

### Asset Loading Failures
- **Detection**: Monitor for 404 errors on asset requests
- **Fallback**: Implement relative asset paths where possible
- **Logging**: Log asset loading failures for debugging

### Domain Mismatch Issues
- **Detection**: Check for mixed content warnings
- **Resolution**: Ensure all internal links use relative paths
- **Monitoring**: Track redirect patterns and performance

### CSRF Token Issues
- **Detection**: Monitor for CSRF token mismatches across domains
- **Resolution**: Ensure session configuration handles both domains
- **Fallback**: Implement domain-agnostic CSRF handling

## Testing Strategy

### Manual Testing
1. **WWW Access Test**: Visit https://www.dgnravepay.com and verify all elements load
2. **Non-WWW Access Test**: Visit https://dgnravepay.com and verify functionality
3. **Cross-Domain Navigation**: Test navigation between pages on both domains
4. **Asset Loading Verification**: Check browser developer tools for asset loading errors

### Automated Testing
1. **Asset URL Generation Tests**: Unit tests for asset URL helpers
2. **Domain Handling Tests**: Feature tests for both domain formats
3. **Redirect Tests**: Test domain normalization redirects if implemented

### Performance Testing
1. **Asset Loading Speed**: Compare loading times between www and non-www
2. **Redirect Performance**: Measure redirect overhead if implemented
3. **Cache Behavior**: Verify proper caching across both domains

## Implementation Approach

### Phase 1: Configuration Updates
1. Update `.env` file with production domain
2. Modify `config/app.php` for dynamic URL handling
3. Test asset URL generation in development

### Phase 2: Asset URL Fixes
1. Review and update asset loading in Blade templates
2. Ensure Vite configuration handles domain variations
3. Test asset loading across both domain formats

### Phase 3: Domain Handling
1. Implement domain normalization strategy (redirect vs. support both)
2. Update .htaccess rules if needed
3. Test redirect behavior and performance

### Phase 4: Validation and Optimization
1. Comprehensive testing across all pages
2. Performance optimization
3. Monitor for any remaining issues

## Security Considerations

### HTTPS Enforcement
- Ensure both www and non-www redirect to HTTPS
- Verify SSL certificate covers both domain formats

### CSRF Protection
- Maintain CSRF token validity across domain formats
- Ensure session security is not compromised

### Content Security Policy
- Update CSP headers to allow assets from both domain formats
- Prevent mixed content issues

## Performance Considerations

### Caching Strategy
- Ensure proper cache headers for assets on both domains
- Consider CDN configuration for both domain formats

### Redirect Overhead
- Minimize redirect chains
- Use appropriate HTTP status codes (301 vs 302)

### Asset Optimization
- Ensure asset bundling works correctly for both domains
- Optimize asset loading performance