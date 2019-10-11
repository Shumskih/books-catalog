use std::io::Result;
use std::fs;

fn main() -> Result<()> {
    create_dir()?;
    Ok(())
}

fn create_dir() -> Result<()> {
    fs::create_dir("./public/uploads")?;
    Ok(())
}
